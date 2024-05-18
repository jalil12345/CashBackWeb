<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\Trip;
use App\Mail\PaymentVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use PayPalHttp\HttpException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // 1. Generate code
        $code = mt_rand(100000, 999999);

        // 2. Save the code to the database
        $user = $request->user(); 
        $user->email_code = $code;
        $user->save();
       
        // 3. send it to the user email 
        Mail::to($user->email)->send(new PaymentVerificationMail($code));
        return view('account.email-code');
         
    }
    public function emailCodeVerification(Request $request)
{
    // Retrieve the email code value from the request
    $email_code = $request->input('email_code');
    
    // Retrieve the authenticated user
    $user = Auth::user();
    $code = $user->email_code;  

    // Retrieve the user's PayPal account
    $paypalAccount = $user->paypalAccount;

    if ($paypalAccount) {
        $paypal_email = $paypalAccount->paypal_email;

        if ($email_code == $code) {
            // Retrieve payable trips for the user
            $payableTrips = Trip::where('user_id', $user->id)
                                ->where('payable', true)
                                ->where('paid_amount', 0) // Only select trips that haven't been paid yet
                                ->get();

            // Calculate the total payable amount
            $totalPayableAmount = $payableTrips->sum('trip_cashback');

            $clientId = config('services.paypal.client_id');
            $clientSecret = config('services.paypal.client_secret');

            // Get PayPal access token
            $accessToken = $this->getPayPalAccessToken($clientId, $clientSecret);

            if ($accessToken) { 
                // Set up your request data
                $requestData = [
                    "items" => [
                        [
                            "receiver" => $paypal_email,
                            "amount" => [
                                "currency" => "USD",
                                "value" => $totalPayableAmount
                            ],
                            "recipient_type" => "EMAIL",
                            "note" => "Thanks for your patronage!"
                        ]
                    ],
                    "sender_batch_header" => [
                        "email_subject" => "You have a payout!",
                        "email_message" => "You have received a payout! Thanks for using our service!"
                    ]
                ];

                // Create a GuzzleHTTP client
                $client = new Client([
                    'base_uri' => 'https://api-m.sandbox.paypal.com/v1/payments/',
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $accessToken
                    ]
                ]);

                try {
                    // Make the POST request to PayPal API
                    $response = $client->post('payouts', [
                        'json' => $requestData
                    ]);

                    // Check the status code of the response
                    if ($response->getStatusCode() === 201) {
                        // Handle successful response
                        $responseData = json_decode($response->getBody()->getContents(), true);
                        // Log the responseData
                        Log::info('paymentC PayPal Payout Response: ' . json_encode($responseData));
                        // Process the response as needed
                        // Update the payable status of trips
                        foreach ($payableTrips as $trip) {
                            $trip->payable = false;
                            $trip->save();
                        }

                        $batchStatus = $responseData['batch_header']['batch_status'];
                        $payoutBatchId = $responseData['batch_header']['payout_batch_id'];
                        // Save payment details to payments table
                        $payment = new Payment();
                        $payment->user_id = $user->id;
                        $payment->payment_method = 'paypal';
                        $payment->payout_batch_id = $payoutBatchId;
                        $payment->status = $batchStatus; 
                        $payment->payment_amount = $totalPayableAmount;
                        $payment->payment_date = now(); // or the appropriate payment date
                        $payment->save();
                        // Redirect the user to the payouts page with a success message
                        return redirect()->route('payouts')->with('success', 'Payout initiated successfully!');
                    } else {
                        // Handle unsuccessful response
                        Log::error('paymentC Error initiating payout: Unexpected status code ' . $response->getStatusCode());
                        // Handle the error response
                    }
                } catch (RequestException $e) {
                    // Handle GuzzleHTTP exceptions
                    $errorMessage = $e->getMessage();
                    Log::error('paymentC Error initiating payout: ' . $errorMessage);
                    // Handle the error response
                }
            } else {
                // Unable to retrieve PayPal access token
                Log::error('paymentC Unable to retrieve PayPal access token.');
                return redirect()->back()->with('error', 'Unable to initiate payout. Please try again later.');
            }
        } else {
            // Incorrect verification code
            $errorMessage = 'Incorrect verification code. Please try again.';
            return view('account.email-code')->with('errorMessage', $errorMessage);
        } 
        } else {
            // No PayPal account associated with this user
            Log::error('paymentC No PayPal account associated with user: ' . $user->id);
            return redirect()->back()->with('error', 'No PayPal account associated with this user.');
        }
    }

    private function getPayPalAccessToken($clientId, $clientSecret)
    {
        // Create a GuzzleHTTP client for getting access token
        $client = new Client([
            'base_uri' => 'https://api-m.sandbox.paypal.com/v1/',
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret)
            ]
        ]);
        try {
            // Make the POST request to get access token
            $response = $client->post('oauth2/token', [
                'form_params' => [
                    'grant_type' => 'client_credentials'
                ]
            ]);
            // Decode the JSON response
            $responseData = json_decode($response->getBody()->getContents(), true);

            // Return the access token
            return $responseData['access_token'];
        } catch (RequestException $e) {
            // Handle GuzzleHTTP exceptions
            Log::error('paymentC Error getting PayPal access token: ' . $e->getMessage());
            return null;
        }
    }

   
}

