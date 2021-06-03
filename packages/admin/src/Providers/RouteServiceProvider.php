<?php

namespace Packages\Admin\Providers;

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
    protected $namespace = 'Packages\Admin\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

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
        Route::prefix(config('admin.prefix_url', 'admin'))
            ->domain(\App::environment('local') ? '' : config('app.url'))
            ->middleware('web')
            ->name('admin::')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../Http/Routes/web.php');
    }

    protected function mapApiRoutes()
    {
        Route::prefix(config('admin.prefix_url', 'admin') . '/api')
            ->domain(\App::environment('local') ? '' : config('app.url'))
            ->middleware('api')
            ->name('admin::api.')
            ->namespace("{$this->namespace}\Api")
            ->group(__DIR__ . '/../Http/Routes/api.php');
    }
}
