<?php

//use Illuminate\Routing\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resources([
        'customer' => 'CustomerController',
    ]);
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('dashboard', function () {
    return 'hola';
    return Inertia::render('Dashboard');
//    return redirect()->route('admin::home');
})->name('dashboard');
