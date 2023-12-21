<?php
return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET'),
    'settings' => [
        'mode' => env('PAYPAL_MODE', 'sandbox'), // Change to 'live' in production
        'http.ConnectionTimeOut' => 30,
    ],
];
