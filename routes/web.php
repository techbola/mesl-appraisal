<?php

Route::get('/', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'index'
]);

Route::middleware(['auth'])->prefix('appraisal')->group(function () {
    Route::get('/dashboard', [
        'uses' => 'AppraisalController@dashboard',
        'as' => 'dashboard'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
