<?php

namespace Packages\News\Providers;

use Packages\News\Console\Commands\NewsSeed;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php','news');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadResources();
        $this->loadRoutesFrom(__DIR__ . '/../Http/Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang','es');

        $this->publishes([
            __DIR__ . '/../../resources/lang'   =>  resource_path('lang/vendor/es')
        ]);

        $this->loadViewsFrom(__DIR__.'/../../resources/views','news');
        // Publishing is only necessary when using the CLI.
        if($this->app->runningInConsole())
        {
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
        return ['news'];
    }

    public function loadResources()
    {
        $this->loadMigrationsFrom([
            __DIR__.'/../database/migrations',
        ]);
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang','news');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../resources/lang');
        $this->loadViewsFrom(__DIR__.'/../../resources/views','news');
    }

    public function publishResources()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../../config/config.php'  => config_path('config.php')
        ], 'news.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../../resources/lang' =>  resource_path('lang/vendor/news')
        ]);

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../../resources/lang' =>  resource_path('lang/vendor/news')
        ], 'news.lang');
    }

    protected function registerCommands()
    {
        $this->commands([
            NewsSeed::class
        ]);
    }
}
