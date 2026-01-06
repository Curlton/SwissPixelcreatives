<?php


return [
    'default_eagerness' => 'moderate',

    'prerender' => [
        // Rules for prerendering
    ],

    'prefetch' => [
        [
            // Wrap the exclusion logic inside 'where' and 'and'
            'where' => [
                'and' => [
                    // First, match everything (or your specific pattern)
                    ['href_matches' => '/*'], 
                    // Then, exclude specific paths
                    [
                        'not' => [
                            'href_matches' => [
                                '/login',
                                '/register',
                                '/admin/*',
                                '/logout',
                                '/*\\?(.+)' // Matches URLs with query strings
                            ]
                        ]
                    ]
                ]
            ],
            'eagerness' => 'conservative',
        ],
    ],
];
