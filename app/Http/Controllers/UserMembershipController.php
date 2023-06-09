<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMembership;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserMembershipController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $userId = $user->id;
        // Check if the user has a membership
        $membership = UserMembership::where('user_id', $userId)->first();
        if(!$membership){
            // User doesn't have a membership, create one
            $membershipName = ($userId <= 2) ? 'macklara early member' : 'macklara member';

            UserMembership::create([
            'user_id' => $userId,
            'membership_name' => $membershipName,
            ]);
        }
            $user_membership = UserMembership::get();
            $payment_methods = PaymentMethod::get();
            $users = User::get();
            return view('home',compact('users','payment_methods','user_membership'));
    }
}
