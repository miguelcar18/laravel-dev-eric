<?php

//use Illuminate\Routing\Route;
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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resources([
        'customer' => 'CustomerController',
    ]);
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('guest')->name('dashboard');
