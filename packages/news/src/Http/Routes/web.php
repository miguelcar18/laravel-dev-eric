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
*/


//use Packages\System\Http\Controllers\SystemUserController;

use Packages\News\Http\Controllers\ArticlesController;
use Packages\News\Http\Controllers\AuthorsController;

Route::group(['middleware' => ['web']], function () {
    Route::prefix('news')->group(function () {
        Route::resource('authors', AuthorsController::class);
//        Route::resource('authors', '\Packages\News\Http\Controllers\AuthorsController');
        Route::resource('news_articles', ArticlesController::class);
//        Route::get('/traits/mail', [AuthorsController::class,'mailNotify']);
        Route::get('/', function () {
            return view('news::index');
        });
    });
});
