<?php

namespace Packages\System\Providers;

use Illuminate\Support\ServiceProvider;

class SystemUserServiceProvider extends ServiceProvider
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
        \Packages\System\Models\SystemUser::observe(\Packages\System\Observers\SystemUserObserver::class);
    }
}
