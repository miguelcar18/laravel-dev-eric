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
    ],
];
