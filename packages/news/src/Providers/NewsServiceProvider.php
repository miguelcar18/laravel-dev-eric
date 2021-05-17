<?php

namespace Packages\News\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\News\Console\Commands\NewsSeed;

class NewsServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__ . '/../../config/news.php', 'news');
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
            __DIR__ . '/../database/migrations',
        ]);
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'news');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../resources/lang');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'news');
    }

    public function publishResources()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../../config/news.php' => config_path('news.php'),
        ], 'news.config');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/news'),
        ], 'news.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/news'),
        ], 'news.lang');

        // Publishing assets.
        $this->publishes([
            __DIR__ . '/../../resources/assets' => public_path('vendor/news'),
        ], 'news.assets');
    }

    protected function registerCommands()
    {
        $this->commands([
            NewsSeed::class,
        ]);

        return $this;
    }
}
