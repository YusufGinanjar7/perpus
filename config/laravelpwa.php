<?php

return [
    'name' => 'Perpustakaan Online',
    'manifest' => [
        'name' => 'Perpustakaan Online',
        'short_name' => 'Perpustakaan',
        'description' => 'An online library app for borrowing books and managing your collection effortlessly.',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/splash-640x1136.png',
            '750x1334' => '/images/splash-750x1334.png',
            '828x1792' => '/images/splash-828x1792.png',
            '1125x2436' => '/images/splash-1125x2436.png',
            '1242x2208' => '/images/splash-1242x2208.png',
            '1242x2688' => '/images/splash-1242x2688.png',
            '1536x2048' => '/images/splash-1536x2048.png',
            '1668x2224' => '/images/splash-1668x2224.png',
            '1668x2388' => '/images/splash-1668x2388.png',
            '2048x2732' => '/images/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
