<?php

Route::get('/register', 'RegisteredUserController@create')
    ->middleware('guest')
    ->name('register');

Route::post('/register', 'RegisteredUserController@store')
    ->middleware('guest');

Route::get('/login', 'AuthenticatedSessionController@create')
    ->middleware('guest')
    ->name('login');

Route::post('/login', 'AuthenticatedSessionController@store')
    ->middleware('guest');

Route::get('/forgot-password', 'PasswordResetLinkController@create')
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', 'PasswordResetLinkController@store')
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', 'NewPasswordController@create')
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', 'NewPasswordController@store')
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', 'EmailVerificationPromptController@__invoke')
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', 'VerifyEmailController@__invoke')
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', 'EmailVerificationNotificationController@store')
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', 'ConfirmablePasswordController@show')
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', 'ConfirmablePasswordController@store')
    ->middleware('auth');

Route::post('/logout', 'AuthenticatedSessionController@destroy')
    ->middleware('auth')
    ->name('logout');
