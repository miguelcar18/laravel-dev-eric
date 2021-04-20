<?php

namespace Packages\System\Providers;

use Packages\System\Console\Commands\SystemSeed;
use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/system.php','system');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadResources();
        $this->loadRoutesFrom(__DIR__.'/../Http/Routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang','es');

        $this->publishes([
            __DIR__.'/../../resources/lang' =>  resource_path('lang/vendor/es')
        ]);

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'test');
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->publishResources();
            $this->registerCommands();
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['system'];
    }

    protected function loadResources()
    {
        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
        ]);
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'system');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../resources/lang');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'system');
    }

    protected function publishResources()
    {
        // // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../../config/system.php' => config_path('system.php'),
        ], 'system.config');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/system'),
        ], 'system.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/system'),
        ], 'system.lang');

    }

    protected function registerCommands()
    {
        $this->commands([
            SystemSeed::class,
        ]);
    }
}
