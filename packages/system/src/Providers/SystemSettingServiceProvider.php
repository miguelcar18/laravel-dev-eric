<?php

namespace Packages\System\Providers;

use Illuminate\Support\ServiceProvider;

class SystemSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        \Packages\System\Models\SystemSetting::observer(\Packages\System\Observers\SystemSettingObserver::class);
    }
}
