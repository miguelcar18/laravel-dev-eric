<?php

return [
    'prefix_url' => 'admin',
    'menu' => [
        [
            'text' => 'admin::pages/sections/left-bar.home',
            'route' => 'admin::home',
            'icon' => 'home',
        ],
        [
            'text' => 'admin::pages/sections/left-bar.customer',
            'route' => 'admin::customer.index',
            'icon' => 'plus-square',
        ],
        [
            'text' => 'admin::pages/sections/left-bar.author',
            'route' => 'news::author.index',
            'icon' => 'plus-square',
        ],
        [
            'text' => 'admin::pages/sections/left-bar.article',
            'route' => 'news::article.index',
            'icon' => 'plus-square',
        ],
    ],
];
