<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],
    
      'facebook' => [
    'client_id' => '237853103752805',
    'client_secret' => '041bec342033e4b7db8e09c6d1c6f88a',
    'redirect' => 'https://www.agronielsen.com/encampo/public/callback',
        ],

'firebase' => [
    'api_key' => 'AIzaSyCJ05Rcuc-Ie0dfz0fDqdRiJJfE8d1rolw', // Only used for JS integration
    'auth_domain' => 'appagronielsen.firebaseapp.com', // Only used for JS integration
    'database_url' => 'https://appagronielsen.firebaseio.com',
    'projectId' => 'appagronielsen',
    'secret' => 'sJxEu1XYPLYngxUEEUkBcntZ1lZ7UV2lat34Ry6s',
    'storage_bucket' => 'appagronielsen.appspot.com', // Only used for JS integration
    'messagingSenderId'=> '70900251108',
],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
