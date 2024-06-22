<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Socialite;
use Str;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GoogleAuth extends Controller
{
    public function googleSignin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {
            $user = Socialite::driver('google')->user();
    
            $user = User::firstOrCreate([
                'email' => $user->email
            ], [
                'name' => $user->name,
                'password' => Hash::make(Str::random(24)),
            ]);
    
            Auth::login($user, true);
    
            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Google OAuth Error: ' . $e->getMessage());
            // Handle the error gracefully or redirect the user to an error page
            // For example:
            return redirect()->route('error.page');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
{
    try {
        $user = Socialite::driver('facebook')->user();
    } catch (\Exception $e) {
        Log::error('Facebook OAuth Error: ' . $e->getMessage());
        return redirect()->route('login')->with('error', 'Error occurred during Facebook authentication.');
    }

    // Log the user data for debugging
    Log::info('Facebook User Data: ' . print_r($user, true));

    // Handle the authenticated user
    $user = User::firstOrCreate([
        'email' => $user->email
    ], [
        'name' => $user->name,
        'password' => Hash::make(Str::random(24)),
    ]);

    Auth::login($user, true);
    return redirect('/home');
}


}
