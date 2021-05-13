<?php

namespace Packages\News\Providers;

use Illuminate\Support\ServiceProvider;

class AuthorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Packages\News\Models\Author::observe(\Packages\News\Observers\AuthorObserver::class);
    }
}
