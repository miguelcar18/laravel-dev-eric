<?php

namespace Packages\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Admin\Models\Menu;

class FacadesServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton(Menu::class, function ($app) {
            return new Menu;
        });
    }
}
