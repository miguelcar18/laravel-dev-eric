<?php

namespace Packages\System\Providers;

use Illuminate\Support\ServiceProvider;

class SystemRegionServiceProvider extends ServiceProvider
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
//        \Packages\System\Models\SystemRegion::observe(\Packages\System\Observers\SystemRegionObserver::class);
    }
}
