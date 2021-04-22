<?php

namespace Packages\System\Providers;

use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\Uuid;

class SystemArticleServiceProvider extends ServiceProvider
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
        \Packages\System\Models\SystemArticle::observe(\Packages\System\Observers\SystemArticleObserver::class);
    }
}
