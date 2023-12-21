<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Paypal;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        // $paymentMethod = PaymentMethod::where('user_id', $request->user()->id)->first();
        // Retrieve the authenticated user
        $user = $request->user();
        // Fetch the payment method associated with the user
        $paymentMethods = $user->paymentMethod;

        // Fetch the paypal_name from the associated paypal_account
        $paypalName = $user->paypalAccount->paypal_name ?? null;

        return view('account/payouts', ['paymentMethods' => $paymentMethods, 'paypal_name' => $paypalName]);
    }
}
