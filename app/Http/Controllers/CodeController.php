<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;

class CodeController extends Controller
{
    public function profile() {
        $user = Auth::user();
        $user_id = Auth::id();
    
        $trips = Trip::where('user_id', $user_id)
                       ->orderBy('created_at', 'desc')
                       ->limit(10)
                       ->get();
        // Initialize referralsCount
        $referralsCount = 0;
        $activeReferralsCount = 0;
        // Check if the authenticated user has a non-null referral_code
        if (!is_null($user->referral_code)) {
            // Count all users who have the authenticated user as their referrer_id
            $referralsCount = User::where('referrer_id', $user_id)->count();

            // Calculate the date 90 days ago
           $ninetyDaysAgo = Carbon::now()->subDays(90);

           // Count the number of users with at least one trip in the last 90 days and have the referrer_id of the authenticated user
            $activeReferralsCount = User::where('referrer_id', $user_id)
            ->whereHas('trips', function ($query) use ($ninetyDaysAgo) {
                $query->where('created_at', '>=', $ninetyDaysAgo);
            })
            ->count();
        }
        return view('profile', ['trips' => $trips,
                                'referralsCount' => $referralsCount,
                                'activeReferralsCount' => $activeReferralsCount
                            ]);
    }
}
