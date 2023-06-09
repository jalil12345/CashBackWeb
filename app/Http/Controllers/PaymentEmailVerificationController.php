<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentEmailVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PaymentEmailVerificationController extends Controller
{
    public function index(Request $request)
    {
     try {   
        // Validate the input
    $request->validate([
        'paymentEmailVerification' => 'required|email',
    ]);
    
    // Retrieve the email value from the request
    $email = $request->input('paymentEmailVerification');
    // Retrieve the authenticated user's ID
    $userId = Auth::id();
    // Check if a payment method already exists for the user
    $paymentMethod = PaymentMethod::where('user_id', $userId)->first();

    // Save the email value to the email_verification column

    if (!$paymentMethod) {
        // Create a new payment method record
        $paymentMethod = new PaymentMethod();
        $paymentMethod->user_id = $userId;
    } 
    // Update the email_associated column
    $paymentMethod->email_associated = $email;
    $paymentMethod->save();
    

    // Perform any other necessary logic or operations

    // Return a response or redirect to another page
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Validation failed
        dd($e->errors());
    }
    }

    public function send(Request $request)
    {
        // Retrieve the payment method associated with the user
        $paymentMethods = Auth::user()->paymentMethod;

        // Generate a verification token
        $token = Str::random(32);
        
        // Save the token in the payment method record
        foreach ($paymentMethods as $paymentMethod) {
            // Update the token for each payment method
            $paymentMethod->token = $token;
            $paymentMethod->save();
        
        }

        $verificationLink = route('payouts.verify', ['token' => $token]);
        // Send the verification email to the user's associated email
        Mail::to($paymentMethod->email_associated)
        ->send(new PaymentEmailVerificationMail($verificationLink));
        }

        public function verifyEmail(Request $request)
        {
            $token = $request->query('token');
            // Find the payment method record with the given token
            $paymentMethod = PaymentMethod::where('token', $token)->first();
            
            if (!$paymentMethod || !$token) {
                // Handle invalid token case (e.g., show an error message)
                dd($paymentMethod);
                // return view('emails.email-verification-failed');
            } else {
                // Update the email_verified flag
                $paymentMethod->email_verification = true;
                $paymentMethod->save();
                
                // Retrieve the authenticated user
                $user = $request->user();
                // Fetch the payment method associated with the user
                $paymentMethods = $user->paymentMethod;
                // Display the email verification success message
                return view('account/payouts', ['paymentMethods' => $paymentMethods]);
            }
        }

    }




