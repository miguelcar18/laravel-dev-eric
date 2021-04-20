<?php

namespace Packages\System\Providers;

use Illuminate\Support\ServiceProvider;

class SystemCountyServiceProvider extends ServiceProvider
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
//        \Packages\System\Models\SystemCounty::observe(\Packages\System\Observers\SystemCountyObserver::class);
    }
}
