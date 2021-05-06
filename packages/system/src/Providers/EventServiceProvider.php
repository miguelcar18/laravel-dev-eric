<?php

namespace Packages\System\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Packages\System\Events\ArticleEvent;
use Packages\System\Events\NewUserEvent;
use Packages\System\Events\PrimerEvento;
use Packages\System\Events\RegisterEvent;
use Packages\System\Listeners\ArticleListener;
use Packages\System\Listeners\NewUserListener;
use Packages\System\Listeners\PrimerListener;
use Packages\System\Listeners\RegisterListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PrimerEvento::class => [
            PrimerListener::class,
        ],
        RegisterEvent::class    =>  [
            RegisterListener::class
        ],
        ArticleEvent::class =>  [
            ArticleListener::class
        ],
        NewUserEvent::class =>  [
            NewUserListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
