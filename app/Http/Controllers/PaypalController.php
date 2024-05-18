<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paypal;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
                Log::error('Error communicating with PayPal API. HTTP status: ' . $response->status());
                
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
                
                // Fetch user data from PayPal API
                $userData = $this->getUserData($accessToken);
                Log::info('userData '  . json_encode($userData));
                // Get the original URL from the session
                $originalUrl = Session::pull('original_url', '/');

                
                if (!empty($userData)) {
                    if (Auth::check()) {
                    // Check if the required fields are present in the user data
                    if (isset($userData['email']) && isset($userData['user_id']) && isset($userData['name'])) {
                        // Proceed with storing user data in the database
                        $existingPaypalAccount = Paypal::where('paypal_email', $userData['email'])->first();
                        if (!$existingPaypalAccount) {
                            $paypalAccount = new Paypal();
                            $paypalAccount->user_id = Auth::id();
                            $paypalAccount->paypal_id = $userData['user_id'];
                            $paypalAccount->paypal_email = $userData['email'];
                            $paypalAccount->paypal_name = $userData['name'];
                            $paypalAccount->paypal_access_token = $accessToken;
                            $paypalAccount->paypal_expires_at = now()->addSeconds($response->json('expires_in'));
                            $paypalAccount->save();
                
                            // Redirect to the original URL with success message
                            return redirect($originalUrl)->with('paypalSuccessMessage', 'PayPal authentication successful!');
                        } else {
                            // Handle the case where the PayPal account is already linked to another user
                            Log::error('PayPal account is already linked to another user');
                            return response()->json(['error' => 'PayPal account is already linked to another user.'], 409);
                        }
                    } else {
                        // Log an error if required fields are missing in the user data
                        Log::error('Required fields are missing in the user data returned from PayPal API.');
                        return response()->json(['error' => 'Required fields are missing in the user data returned from PayPal API.'], 500);
                    }
                } else {
                    return redirect()->route('login');
                }
                } else {
                    // Log an error if user data is empty or not received
                    Log::error('User data is empty or not received from PayPal API.');
                    return response()->json(['error' => 'User data is empty or not received from PayPal API.'], 500);
              }    }
        } catch (\Exception $e) {
            // Log any exception that occurs during the request
            Log::error('Exception occurred while exchanging authorization code for access token: ' . $e->getMessage());
            return response('this is the response body');
        }
            // return response('this is the response body');
    }

    /**
     * Get user data from the PayPal API using the access token.
     *
     * @param string $accessToken
     * @return array
     */
    protected function getUserData($accessToken)
    {
        
        $apiUrl = 'https://api-m.sandbox.paypal.com/v1/identity/openidconnect/userinfo?schema=openid';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($apiUrl);
                
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

        }
    }
}
