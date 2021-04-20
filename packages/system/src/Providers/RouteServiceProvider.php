<?php

namespace Packages\System\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/system';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
//     protected $namespace = 'App\\Http\\Controllers';
    protected $namespace = 'Packages\\System\\Http\\Controllers';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
//        $this->configureRateLimiting();

//        $this->routes(function () {
//            Route::prefix('api')
//                ->middleware('api')
//                ->namespace($this->namespace)
//                ->group(base_path(__DIR__.'/../Http/Routes/api.php'));
//
//            Route::prefix('web')
//                ->middleware('web')
//                ->namespace($this->namespace)
//                ->group(base_path(__DIR__.'/../Http/Routes/web.php'));
//        });
        parent::boot();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
//    protected function configureRateLimiting()
//    {
//        RateLimiter::for('api', function (Request $request) {
//            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
//        });
//    }


    public function mapWebRoutes()
    {
        Route::prefix(config('system.prefix_url','system'))
            ->middleware('web')
//            ->domain(str_replace(['http://','https://'],'',env('APP_URL')))
            ->name('system::')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../Http/Routes/web.php');
    }

    public function mapApiRoutes()
    {
        Route::prefix(config('system.prefix_url','system'))
            ->middleware('api')
//            ->domain(str_replace(['http://','https://'],'',env('APP_URL')))
            ->name('system::api.')
            ->namespace("{$this->namespace}\Api")
            ->group(__DIR__.'/../Http/Routes/api.php');
    }
}
