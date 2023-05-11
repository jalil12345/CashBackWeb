<?php

namespace App\Listeners;

use App\Events\LinkClicked;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreLinkClick
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Store the clicked link in your database or wherever you want
        // For example, you can use Laravel's built-in Eloquent ORM to store it in a database
        History::create([
            'url' => $event->link,
            'clicked_at' => now(),
        ]);
    }
}
