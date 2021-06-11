<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CustomerController@index']);
    });

    Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'PermissionController@index']);
    });

    Route::group(['prefix' => 'group', 'as' => 'group.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'GroupController@index']);
    });
});
