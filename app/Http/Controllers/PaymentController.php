<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $amount = Payment::where('id', 1)->value('payment_amount');
        // $payment = Payment::get();

        return view('vendor/cashier/payment', compact('amount'));
    }
}
