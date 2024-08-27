<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class ReferralController extends Controller
{
    public function handleReferral($code)
    {
        $referrer = User::where('referral_code', $code)->first();

        if ($referrer) {
            // Set a cookie for the referrer_id that expires in 30 days
            Cookie::queue('referrer_id', $referrer->id, 2); //43200 = 30 days 
            return redirect('/register'); // Assuming this is your social login route
        } else {
            
            return redirect('/');
        }
    }
}
