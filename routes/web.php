<?php

Route::get('/', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'index'
]);

Route::get('/users', [
    'uses' => 'AppraisalController@users',
    'as' => 'users'
]);

Route::middleware(['auth'])->prefix('appraisal')->group(function () {

    Route::get('/', [
        'uses' => 'AppraisalController@index',
        'as' => 'appraisal.index'
    ]);

    Route::get('/all/appraisals', [
        'uses' => 'AppraisalController@allAppraisals',
        'as' => 'allAppraisals'
    ]);

    Route::get('/dashboard', [
        'uses' => 'AppraisalController@dashboard',
        'as' => 'dashboard'
    ]);

    Route::post('/staff_details/store', [
        'uses' => 'AppraisalController@staffDetailsStore',
        'as' => 'staff_details.store'
    ]);

    Route::post('/bsc_financial/store', [
        'uses' => 'AppraisalController@bscFinancialStore',
        'as' => 'bsc_financial.store'
    ]);

    Route::post('/bsc_customer/store', [
        'uses' => 'AppraisalController@bscCustomerStore',
        'as' => 'bsc_customer.store'
    ]);

    Route::post('/bsc_internal/store', [
        'uses' => 'AppraisalController@bscInternalStore',
        'as' => 'bsc_internal.store'
    ]);

    Route::post('/bsc_learning/store', [
        'uses' => 'AppraisalController@bscLearningStore',
        'as' => 'bsc_learning.store'
    ]);

    Route::post('/staff_behavioural/store', [
        'uses' => 'AppraisalController@staffBehaviouralStore',
        'as' => 'staff_behavioural.store'
    ]);

    Route::post('/other_appraisal/store', [
        'uses' => 'AppraisalController@otherAppraisalStore',
        'as' => 'other_appraisal.store'
    ]);

    Route::get('/delete/appraisal/{id}', [
        'uses' => 'AppraisalController@deleteAppraisal',
        'as' => 'deleteAppraisal'
    ]);

    Route::get('/edit/appraisal/{id}', [
        'uses' => 'AppraisalController@editAppraisal',
        'as' => 'editAppraisal'
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
