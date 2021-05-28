<?php

return [
    'prefix_url' => 'news',
    'menu' => [
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
