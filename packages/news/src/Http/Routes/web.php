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

Route::group(['middleware' => ['auth', 'verified', 'can_use_route']], function () {
    Route::resource('author', 'AuthorController');
//        Route::resource('news_articles', ArticleController::class);
    Route::resource('article', 'ArticleController')->middleware('can:create');
    Route::resource('message', 'MessageController');
//        Route::get('/traits/mail', [AuthorController::class,'mailNotify']);
    Route::get('/', function () {
        return view('news::index');
    });
});
