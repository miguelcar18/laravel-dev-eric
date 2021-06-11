<?php

namespace Packages\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class GroupServiceProvider extends  ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Packages\Admin\Models\Group::observe(\Packages\Admin\Observers\GroupObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
