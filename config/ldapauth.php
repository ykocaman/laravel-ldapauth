<?php

return [

    'connections' => [

        'default' => [
            'server' => env('LDAPAUTH_SERVER'),
            'username' => env('LDAPAUTH_USERNAME'),
            'password' => env('LDAPAUTH_PASSWORD'),
            'port' => env('LDAPAUTH_PORT', 389),
            'base_dn' => env('LDAPAUTH_BASE_DN')
        ],

       /*
        * if you want use custom config per domain, you can type it here
        *

          'example.com' => [
            'server' =>'',
            'username' => '',
            'password' => '',
            'port' => 389,
            'base_dn' => env('LDAPAUTH_BASE_DN')
        ]

       */
    ]
];
