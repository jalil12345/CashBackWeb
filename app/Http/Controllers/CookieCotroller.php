<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieCotroller extends Controller
{
    public function handleClick($link) {
        // handle the link click event
        // ...
    
        // set the cookie with the last clicked link
        $response = new Response('Hello World');
        $response->withCookie(cookie('last_clicked_link', $link));
        return $response;
        $value = request()->cookie('last_clicked_link');
        dd($value);
    }
}
