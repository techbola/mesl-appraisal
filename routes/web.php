<?php

Route::get('/', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'index'
]);

Route::middleware(['auth'])->prefix('appraisal')->group(function () {

    Route::get('/dashboard', [
        'uses' => 'AppraisalController@index',
        'as' => 'dashboard'
    ]);

    Route::post('/appraisal/store', [
        'uses' => 'AppraisalController@store',
        'as' => 'appraisal.store'
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
