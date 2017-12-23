<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '227946631080342',         // Your GitHub Client ID
    'client_secret' => '3cf0d6de5ad08db7e613c9d9b142e3ef', // Your GitHub Client Secret
    'redirect' => 'http://pet.test/login/facebook/callback',
    ],

    'twitter' => [
    'client_id' => '0ETZ4R8VrVY6LwwfqZtYS37JC',         // Your GitHub Client ID
    'client_secret' => 'gM1Wy5fAppzuBswvMgFpSEdqaSQt2emK5bdeInMy38aRvEL5lI', // Your GitHub Client Secret
    'redirect' => 'http://pet.test/login/twitter/callback',
    ],

];
