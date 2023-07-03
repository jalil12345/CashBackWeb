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
    // Update the name field of the user
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
        return redirect('account-details');
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
            return redirect('account-details')->with('user', $user);
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
        
    }
    



