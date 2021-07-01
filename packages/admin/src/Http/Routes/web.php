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
    Route::get('group_permission/{group}','GroupController@group_permission')->name('group.group_permission');
    Route::post('assig_permission/{group}','GroupController@assigPermission')->name('group.assig_permission');
    Route::get('group_user/{group}','GroupController@group_user')->name('group.group_user');
    Route::post('assig_user/{group}','GroupController@assigUser')->name('group.assig_user');

});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('guest')->name('dashboard');
