<?php

namespace Packages\System\Providers;

use Illuminate\Support\ServiceProvider;

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
//        \Packages\System\Models\SystemArticle::observer(\Packages\System\Observers\SystemArticleObserver::class);
    }
}
