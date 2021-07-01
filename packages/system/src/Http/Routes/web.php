<?php

//use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {

});
 */

Route::group(['middleware' => ['auth', 'verified', 'can_use_route']], function () {
    Route::resource('users', 'SystemUserController');
    Route::resource('articles', 'SystemArticleController');
    Route::get('/traits/mail', 'SystemUserController@mailTrait');
    Route::get('/', function () {
        return view('test::index');
    });
});
