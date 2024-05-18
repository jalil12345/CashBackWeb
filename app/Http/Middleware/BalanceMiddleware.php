<?php


namespace App\Http\Middleware;

use Closure;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class BalanceMiddleware
{
    public function handle($request, Closure $next)
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        
        // Check if a user is authenticated
        if ($user) {
            // Calculate pending, verified, and payable balances
            $pendingBalance = Trip::where('user_id', $user->id)->where('pending', true)->sum('trip_cashback');
            $verifiedBalance = Trip::where('user_id', $user->id)->where('verified', true)->sum('trip_cashback');
            $payableBalance = Trip::where('user_id', $user->id)->where('payable', true)->sum('trip_cashback');
        } else {
            // If no user is authenticated, set balances to 0
            $pendingBalance = 0;
            $verifiedBalance = 0;
            $payableBalance = 0;
        }
        // Share balances data with all views
        view()->share('pendingBalance', $pendingBalance);
        view()->share('verifiedBalance', $verifiedBalance);
        view()->share('payableBalance', $payableBalance);

        return $next($request);
    }
}
