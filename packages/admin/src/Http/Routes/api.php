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

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    Route::post('me', ['as' => 'me', 'uses' => 'AuthController@me']);
    Route::post('refresh', ['as' => 'token.refresh', 'uses' => 'AuthController@refresh']);
});

Route::group(['middleware' => ['auth.jwt', 'verified']], function () {

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
