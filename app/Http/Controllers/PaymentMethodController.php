<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use App\Models\Paypal;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        // Fetch the payment method associated with the user
        $paymentMethods = $user->paymentMethod;
        
        $email_verified = $user->email_verified_at ;

        // Fetch the paypal_name from the associated paypal_account
        $paypalName = $user->paypalAccount->paypal_name ?? null;
        $user_id = Auth::id();

        $trips = Trip::where('user_id', $user_id)
                   ->orderBy('created_at', 'desc')
                   ->limit(10)
                   ->get();

        return view('account.payouts', [
            'paymentMethods' => $paymentMethods,
            'paypal_name' => $paypalName,
            'email_verified' => $email_verified,
            'trips' => $trips
            
        ]);
    }
}
