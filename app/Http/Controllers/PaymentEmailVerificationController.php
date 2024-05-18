<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentEmailVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class PaymentEmailVerificationController extends Controller
{
    public function index(Request $request)
    {
     try {   
        // Validate the input
    $request->validate([
        'paymentEmailVerification0' => 'required|email',
    ]);
    
    // Retrieve the email value from the request
    $email = $request->input('paymentEmailVerification0');
    // Retrieve the authenticated user
    $user = Auth::user();
    // Update the email and email_verified_at field of the user
    $user->email = $email;
    $user->email_verified_at = null;
    $user->save();

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Validation failed
        dd($e->errors());
    }
    }

    public function send(Request $request)
    {
        $user = Auth::user();
        
        // Generate a verification token
        $token = Str::random(32);
        
         $user->token =$token;
         $user->save();
        
        $verificationLink = route('payouts.verify', ['token' => $token]);
        // Send the verification email to the user's associated email
        Mail::to($user->email)
        ->send(new PaymentEmailVerificationMail($verificationLink));
        return redirect('account-details')->with('successEmailVerification', 'your email verification has been sent successfully.');
        }

        public function verifyEmail(Request $request)
        {
            $token = $request->query('token');
            // Find the payment method record with the given token
            $user = Auth::user();
            
            if ($token === $user->token) {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect('account-details');
            } else {
                return redirect('home');
            }
        }

        public function changeUserName(Request $request)
        {
        try {   
                // Validate the input
            $request->validate([
                    'changeUserNameInput' => 'required|max:255|alpha_num',
                ]);
            // Retrieve the username value from the request
            $username =$request->input('changeUserNameInput');
            // Retrieve the authenticated user
            $user = Auth::user();
            // Update the name field of the user
            $user->name = $username;
            $user->save();
            // Redirect to the account settings route with the user data
            return redirect('account-details')->with('successUserName', 'User Name updated successfully.');
        }
        catch(\Illuminate\Validation\ValidationException $e){
             // Handle validation errors
             // You can return an error response or redirect back with errors
             return redirect('account-details')->with('warning', $e->getMessage());
        }
        }
        public function updatePassword(Request $request)
        {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);
            $user = Auth::user();
            // Verify the current password
            if (!Hash::check($request->current_password, $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => 'The current password is incorrect.',
                ]);
                
            }
            // Update the password
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('account-details')->with('success', 'Password updated successfully.');
        }
        public function addNumber(Request $request)
        {
            try {
                // Retrieve the phone number and country code values from the request
                $userNumber = $request->input('phoneNumberInput');
                $countryCode = $request->input('countryCodeInput');

                // Concatenate country code with phone number
                $userPhoneNumber = $countryCode . $userNumber;

                // Retrieve the authenticated user
                $user = Auth::user();
                
                // Update the phone_number field of the user
                $user->phone_number = $userPhoneNumber;
                $user->save();
                // Redirect to the account details route with success message
                return redirect('account-details')->with('successPhoneNumber', 'Phone Number updated successfully.');
            } catch (\Illuminate\Validation\ValidationException $e) {
                $message = $e->getMessage();
                // Handle validation errors
                // Redirect back with validation errors
                return redirect('account-details')->with('warning', $message);
            } catch (\Exception $e) {
                $message = $e->getMessage();
                // Handle other exceptions
                // Redirect back with error message
                return redirect('account-details')->with('warning', $message);
            }
        }

        // Define Twilio constants for testing
                const TWILIO_ACCOUNT_SID = 'AC2cd6cb929248aa037014e60acc6441e6';
                const TWILIO_AUTH_TOKEN = '7a04e70c5fe8221352937b3ceb9f12a1';
                const TWILIO_PHONE_NUMBER = '+213655585124';
        public function sendSmsToNumber(Request $request){
            try {
                // Generate a random 6-digit verification code
                $verificationCode = mt_rand(100000, 999999);
    
                // Retrieve the user's phone number
                $userNumber = Auth::user()->phone_number;
    
                // Your Twilio credentials
                // $sid = 'TWILIO_ACCOUNT_SID';
                // $token = 'TWILIO_AUTH_TOKEN';
                // $twilioNumber = 'TWILIO_PHONE_NUMBER';
    
                // Initialize Twilio client
                $client = new Client(self::TWILIO_ACCOUNT_SID, self::TWILIO_AUTH_TOKEN);
    
                // Send SMS message
                $client->messages->create(
                    self::TWILIO_PHONE_NUMBER,
                    [
                        'from' => self::TWILIO_PHONE_NUMBER,
                        'body' => "Your verification code is: $verificationCode"
                    ]
                );
    
                // Store verification code in session
                Session::put('verification_code', $verificationCode);
    
                // Redirect to the SMS verification view with success message
                return view('account.sms-code')->with('success', 'Verification code sent successfully.');
            } catch (\Exception $e) {
                // Handle exceptions
                $errorMsg = $e->getMessage();
                Log::info('Twilio API response: ' . $errorMsg);
                return back()->with('error', 'Failed to send verification code.');
            }
        }
        
        public function getSmsFromNumber(Request $request){
            try {
                // Retrieve the verification code entered by the user
                $userEnteredCode = $request->input('sms_code');
    
                // Retrieve the verification code from the session
                $verificationCode = Session::get('verification_code');
    
                // Compare the entered code with the stored code
                if ($userEnteredCode == $verificationCode) {
                    // Verification successful
                    return redirect()->route('verification.success');
                } else {
                    // Verification failed
                    return back()->with('error', 'Invalid verification code.');
                }
            } catch (\Exception $e) {
                // Handle exceptions
                return back()->with('error', 'Error processing verification.');
            }
             }
        }
    



