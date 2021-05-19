<?php

namespace Packages\Admin\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

class DateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Date::setLocale(Config::get('app.locale'));
    }

    public function register()
    {
        //
    }
}
