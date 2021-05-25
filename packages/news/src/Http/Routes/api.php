<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your API!
|
 */

//Route::group(['middleware' => ['auth.jwt', 'verified', 'can_use_route']], function () {
//
//});

Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => 'author', 'as' => 'author.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'AuthorController@index']);
    });

});
