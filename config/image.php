<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    'path' => [
        'client' => 'images/client/',
        'work' => [
            'main' => 'images/work/main/',
            'logo' => 'images/work/logo/',
        ],
        'news' => 'images/journal/',
        'member' => 'images/member/',
    ],

);
