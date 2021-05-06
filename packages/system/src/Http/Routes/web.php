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

use Packages\System\Http\Controllers\SystemUserController;

Route::group(['middleware' => ['web']], function () {
    Route::prefix('system')->group(function () {
        Route::resource('users', '\Packages\System\Http\Controllers\SystemUserController');
        Route::resource('articles', '\Packages\System\Http\Controllers\SystemArticleController');
        Route::get('/traits/mail', [SystemUserController::class,'mailTrait']);
        Route::get('/', function () {
            return view('test::index');
        });
    });
});
