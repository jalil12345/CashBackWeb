<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Socialite;
use Str;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class GoogleAuth extends Controller
{
    public function googleSignin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {
            $socialUser = Socialite::driver('google')->user();
            $user = User::where('email', $socialUser->email)->first();
    
            if ($user) {
                // User exists, handle login
                if (is_null($user->referrer_id) || $user->referrer_id == '0') {
                    // Check for referrer_id cookie
                  
                    if (Cookie::has('referrer_id')) {
                        $user->referrer_id = Cookie::get('referrer_id');
                        Cookie::queue(Cookie::forget('referrer_id')); // Remove the cookie after use
                        $user->save();
                    } else {
                        $user->referrer_id = '1';
                        $user->save();
                    }
                }
                
                Auth::login($user, true);
                return redirect('/');
            } else {
                // User does not exist, handle registration
                $referrer_id = Cookie::has('referrer_id') ? Cookie::get('referrer_id') : '1';
                $user = User::create([
                    'email' => $socialUser->email,
                    'name' => $socialUser->name,
                    'password' => Hash::make(Str::random(24)),
                    'referrer_id' => $referrer_id,
                ]);

                if (Cookie::has('referrer_id')) {
                    Cookie::queue(Cookie::forget('referrer_id')); 
                }
                
                Auth::login($user, true);
                return redirect('/');
            }
        } catch (\Exception $e) {
            Log::error('Google OAuth Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Error occurred during Google authentication.');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $socialUser = Socialite::driver('facebook')->user();
            $user = User::where('email', $socialUser->email)->first();

            if ($user) {
                // User exists, handle login
                if (is_null($user->referrer_id) || $user->referrer_id == '0') {
                    // Check for referrer_id cookie
                    if (Cookie::has('referrer_id')) {
                        $user->referrer_id = Cookie::get('referrer_id');
                        Cookie::queue(Cookie::forget('referrer_id')); // Remove the cookie after use
                        $user->save();
                    } else {
                        $user->referrer_id = '1';
                        $user->save();
                    }
                }
                Auth::login($user, true);
                return redirect('/');
            } else {
                // User does not exist, handle registration
                $referrer_id = Cookie::has('referrer_id') ? Cookie::get('referrer_id') : '1';
                $user = User::create([
                    'email' => $socialUser->email,
                    'name' => $socialUser->name,
                    'password' => Hash::make(Str::random(24)),
                    'referrer_id' => $referrer_id,
                ]);

                if (Cookie::has('referrer_id')) {
                    Cookie::queue(Cookie::forget('referrer_id')); // Remove the cookie after use
                }

                Auth::login($user, true);
                return redirect('/');
            }
        } catch (\Exception $e) {
            Log::error('Facebook OAuth Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Error occurred during Facebook authentication.');
        }
    }
}
