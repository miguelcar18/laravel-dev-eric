<?php

namespace Packages\News\Providers;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
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
        \Packages\News\Models\Article::observe(\Packages\News\Observers\ArticleObserver::class);
    }
}
