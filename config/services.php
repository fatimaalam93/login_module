<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '532710837581664',
        'client_secret' => '65b6947ab4b4a90e842ab308c05a2dff',
        'redirect' => 'http://localhost/login_module/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '574325605911-o5spi99c65dh1bb2djj45jnv61tr22pl.apps.googleusercontent.com',
        'client_secret' => 'kkMuozMIRJ3tKmMEKd83xy4p',
        'redirect' => 'http://localhost/login_module/login/google/callback',
    ],

];
