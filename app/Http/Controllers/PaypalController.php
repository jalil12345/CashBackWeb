<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paypal;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class PaypalController extends Controller
{
     /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function initiatePaypalAuthentication()
    {
        // Retrieve PayPal API credentials from configuration
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');
        $apiUrl = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';
        $redirectUrl = config('services.paypal.redirect_url');

        // Store the original URL in the session
        Session::put('original_url', url()->previous());

        try {
            // Obtain access token from PayPal API
            $response = Http::asForm()
                ->withHeaders([
                    'Authorization' => 'Basic ' . base64_encode("$clientId:$clientSecret"),
                ])
                ->withOptions(['verify' => false])
                ->post($apiUrl, [
                    'grant_type' => 'client_credentials',
                ]);

            // Check if the request was successful
            if ($response->successful()) {
                $accessToken = $response->json('access_token');
                Log::info('PayPal API response. Access Token: ' . $accessToken);

                // Continue with your logic to redirect the user or perform other actions
                $url = "https://www.sandbox.paypal.com/signin/authorize?" .
       "client_id={$clientId}&redirect_uri={$redirectUrl}&response_type=code&scope=openid%20profile%20email";

                Log::info('Initiating PayPal account linking. Redirecting to: ' . $url);


                return redirect($url);
            } else {
                // Log the error details if the request was not successful
                // Log::error('Error communicating with PayPal API. HTTP status: ' . $response->status());
                // Log::error('Error details: ' . $response->body());

                return response()->json(['error' => 'An error occurred while communicating with PayPal API.'], 500);
            }
            } catch (\Exception $e) {
                // Log any exception that occurs during the request
                Log::error('Exception occurred while communicating with PayPal API: ' . $e->getMessage());
                return response()->json(['error' => 'An exception occurred while communicating with PayPal API.'], 500);
            }
    }

    /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function handlePaypalCallback(Request $request)
    {
       // Handle the PayPal callback after the user links their account
        // Extract information from the callback request
        $code = $request->query('code');

        // Log::info('PayPal callback received. Authorization code: ' . $code);
        
        // Exchange authorization code for an access token
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');
        $apiUrl = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';

        // Log::info('PayPal API request: ' . print_r([
        //     'url' => $apiUrl,
        //     'data' => [
        //         'grant_type' => 'authorization_code',
        //         'code' => $code,
        //     ],
        // ], true));
    

        try {
            $response = Http::asForm()
                ->withHeaders([
                    'Authorization' => 'Basic ' . base64_encode("$clientId:$clientSecret"),
                ])
                ->withOptions(['verify' => false])
                ->post($apiUrl, [
                    'grant_type' => 'authorization_code',
                    'code' => $code,
                ]);

            // Check if the request was successful
            if ($response->successful()) {
                $accessToken = $response->json('access_token');
                Log::info('PayPal API response. Access Token: ' . $accessToken);

                // Fetch user data from PayPal API
                $userData = $this->getUserData($accessToken);

                // Get the original URL from the session
                $originalUrl = Session::pull('original_url', '/');

                
                // Store user data in the database
                if (!empty($userData)) {
                    $existingPaypalAccount = Paypal::where('paypal_email', $userData['email'])->first();
                    if(!$existingPaypalAccount){
                        $paypalAccount = new Paypal();
                        $paypalAccount->user_id = auth()->user()->id;
                        $paypalAccount->paypal_id=$userData['user_id'];
                        $paypalAccount->paypal_email = $userData['email'];
                        $paypalAccount->paypal_name = $userData['name'];
                        $paypalAccount->paypal_access_token = $accessToken;
                        $paypalAccount->paypal_expires_at = now()->addSeconds($response->json('expires_in'));
                        $paypalAccount->save();

                        // In your controller method handling PayPal callback
                    return redirect($originalUrl)->with('paypalSuccessMessage', 'PayPal authentication successful!');
                    } else{
                            // Handle the case where the PayPal account is already linked to another user
                         return response()->json(['error' => 'PayPal account is already linked to another user.'], 409);
                    }
                    
                }

                

            } else {
                // Log the error details if the request was not successful
                Log::error('Error exchanging authorization code for access token. HTTP status: ' . $response->status());
                Log::error('Error details: ' . $response->body());

                return response()->json(['error' => 'An error occurred while exchanging authorization code for access token.'], 500);
            }
        } catch (\Exception $e) {
            // Log any exception that occurs during the request
            Log::error('Exception occurred while exchanging authorization code for access token: ' . $e->getMessage());
            return response()->json(['error' => 'An exception occurred while exchanging authorization code for access token.'], 500);
        }
            
            
            return response()->json(['success' => true]);
    }

    /**
     * Get user data from the PayPal API using the access token.
     *
     * @param string $accessToken
     * @return array
     */
    protected function getUserData($accessToken)
    {
        // ?schema=openid
        $apiUrl = 'https://api-m.sandbox.paypal.com/v1/identity/openidconnect/userinfo?schema=openid';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($apiUrl);
                // Log the entire response
        Log::info('PayPal API response: ' . $response->body());
            // Check if the request was successful
            if ($response->successful()) {
                return $response->json();
            } else {
                // Log the error details if the request was not successful
                Log::error('Error getting user data from PayPal API. HTTP status: ' . $response->status());
                Log::error('Error details: ' . $response->body());

                // Handle the error as needed
                return [];
            }
        } catch (\Exception $e) {
            // Log any exception that occurs during the request
            Log::error('Exception occurred while getting user data from PayPal API: ' . $e->getMessage());

            // Handle the exception as needed
            return [];
        }
    }
}
