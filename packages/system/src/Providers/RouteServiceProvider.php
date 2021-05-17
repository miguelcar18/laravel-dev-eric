<?php

namespace Packages\System\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Packages\System\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::prefix(config('system.prefix_url', 'system'))
            ->domain(\App::environment('local') ? '' : config('app.url'))
            ->middleware('web')
            ->name('system::')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Http/Routes/web.php');
    }

    protected function mapApiRoutes()
    {
        Route::prefix(config('system.prefix_url', 'system') . '/api')
            ->domain(\App::environment('local') ? '' : config('app.url'))
            ->middleware('api')
            ->name('system::api.')
            ->namespace("{$this->namespace}\Api")
            ->group(__DIR__ . '/../Http/Routes/api.php');
    }
}
