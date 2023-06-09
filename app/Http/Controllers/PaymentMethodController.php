<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        // $paymentMethod = PaymentMethod::where('user_id', $request->user()->id)->first();
        // Retrieve the authenticated user
        $user = $request->user();
        // Fetch the payment method associated with the user
        $paymentMethods = $user->paymentMethod;
        // Fetch the payment methods associated with the user
        // $paymentMethods = PaymentMethod::where('user_id', $user->id)->get();
        //   dd($paymentMethods);
        return view('account/payouts', ['paymentMethods' => $paymentMethods]);
    }
}
