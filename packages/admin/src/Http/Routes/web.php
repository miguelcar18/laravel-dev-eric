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

Route::get('refresh-csrf', function () {
    return response()->json([
        'token' => csrf_token(),
    ], 200);
})->name('refresh-csrf');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resources([
        'customer' => 'CustomerController',
    ]);

    Route::resources([
        'permission' => 'PermissionController',
    ]);

    Route::resources([
        'group' => 'GroupController',
    ]);

});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('guest')->name('dashboard');
