<?php


namespace App\Http\Controllers;

use App\Events\LinkClicked;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClickController extends Controller
{
    public function handleClick($link)
    {
        // Handle the link click event
        // ...

        // Fire the event
        event(new LinkClicked($link));

        // Return the response
        return new Response('Link clicked successfully');
    }
}
