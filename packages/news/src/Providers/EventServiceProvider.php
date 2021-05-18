<?php

namespace Packages\News\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Packages\News\Events\ArticleEvent;
use Packages\News\Events\AuthorEvent;
use Packages\News\Listeners\ArticleListener;
use Packages\News\Listeners\AuthorListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AuthorEvent::class  =>  [
            AuthorListener::class
        ],
        ArticleEvent::class =>  [
           ArticleListener::class
        ]
    ];

    public function boot()
    {
        parent::boot();
    }
}
