<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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

    'firebase' => [
        'api_key' => 'AIzaSyAP6h7bTTYDu53ZbFL26oy6amweLRkVta4',
        'auth_domain' => 'seaid-hivet.firebaseapp.com',
        'database_url' => 'https://seaid-hivet-default-rtdb.firebaseio.com',
        'project_id' => 'seaid-hivet',
        'storage_bucket' => 'seaid-hivet.appspot.com',
        'messaging_sender_id' => '247912380501',
        'app_id' => '1:247912380501:web:589ba84ff72fd129a03cdc',
        'measurement_id' => 'G-GMJB8YW3QY',
    ],

];
