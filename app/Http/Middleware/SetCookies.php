<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class SetCookies
{
    public function handle($request, Closure $next)
    {
        // Check if the cookie 'username' exists
        if (!Cookie::has('username')) {
            // Set the cookie only if it doesn't exist 
            // Cookie::queue('username', 'john_doe', 60);
        }
        return $next($request);
    }
}