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


//use Packages\News\Http\Controllers\ArticleController;
//use Packages\News\Http\Controllers\AuthorController;

Route::group(['middleware' => ['web']], function () {
    Route::prefix('news')->group(function () {
//        Route::resource('authors', AuthorController::class);
        Route::resource('authors', '\Packages\News\Http\Controllers\AuthorController');
//        Route::resource('news_articles', ArticleController::class);
        Route::resource('news_articles', '\Packages\News\Http\Controllers\ArticleController');
//        Route::get('/traits/mail', [AuthorController::class,'mailNotify']);
        Route::get('/', function () {
            return view('news::index');
        });
    });
});
