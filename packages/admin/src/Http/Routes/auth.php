<?php

Route::get('login', 'LoginController@showLoginForm')->name('login');

Route::get('register', 'RegisterController@showLoginForm')->name('register');

Route::get('/dashboard', function () {
    return redirect()->route('admin::home');
});
