<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DetailsController extends Controller
{
    function index() {
        $user = Auth::user();
    
        // Eager load the paypalAccount relationship
        $user->load('paypalAccount');
    
        // Access the paypal_name attribute
        $paypalName = $user->paypalAccount->paypal_name ?? null;
    
        return view('account/account-settings', ['user' => $user, 'paypal_name' => $paypalName]);
    }
}
