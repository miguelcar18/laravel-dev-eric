<?php

namespace Packages\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Admin\Console\Commands\AdminSeed;
use Packages\Admin\Console\Commands\Admin;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadResources();
        $this->registerCommands();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->publishResources();
            $this->registerCommands();
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/admin.php', 'admin');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['admin'];
    }

    public function loadResources()
    {
        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
            __DIR__ . '/../database/migrations/vendor/junges/acl',
        ]);
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang','admin');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../resources/lang');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views','admin');
    }

    public function publishResources()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../../config/admin.php' => config_path('admin.php'),
        ], 'admin.views');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/admin'),
        ], 'admin.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/admin'),
        ], 'admin.lang');

        // Publishing assets.
        $this->publishes([
            __DIR__ . '/../../resources/assets' => public_path('vendor/admin'),
        ], 'admin.assets');
    }

    public function registerCommands()
    {
        $this->commands([
            AdminSeed::class,
            Admin::class,
        ]);

        return $this;
    }
}
