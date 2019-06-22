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
        'as' => 'staff.index'
    ]);

    Route::get('/all/appraisals', [
        'uses' => 'AppraisalController@allAppraisals',
        'as' => 'staff.appraisals'
    ]);

    Route::get('/dashboard/{appraisalID}', [
        'uses' => 'AppraisalController@dashboard',
        'as' => 'dashboard'
    ]);

    Route::post('/staff_details/store', [
        'uses' => 'AppraisalController@staffDetailsStore',
        'as' => 'staff_details.store'
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

    Route::get('/submit/goal/{id}', [
        'uses' => 'AppraisalController@submitAppraisalSupervisor',
        'as' => 'submitAppraisalSupervisor'
    ]);

    Route::get('/view/goals/{id}', [
        'uses' => 'AppraisalController@viewGoals',
        'as' => 'viewGoals'
    ]);

    Route::get('/rejected/goals/{id}', [
        'uses' => 'AppraisalController@rejectedGoalsa',
        'as' => 'rejectedGoals'
    ]);

//    Finance Goal Setting
    Route::post('/bsc_financial/store', [
        'uses' => 'FinanceAppraisalController@bscFinancialStore',
        'as' => 'bsc_financial.store'
    ]);
    Route::post('/delete/finance/appraisals', [
        'uses' => 'FinanceAppraisalController@deleteAppraisals',
        'as' => 'deleteFinanceAppraisals'
    ]);
    Route::post('/update/finance/appraisal', [
        'uses' => 'FinanceAppraisalController@updateFinanceAppraisal',
        'as' => 'updateFinanceAppraisal'
    ]);

//    Customer Goal Setting
    Route::post('/bsc_customer/store', [
        'uses' => 'CustomerAppraisalController@bscCustomerStore',
        'as' => 'bsc_customer.store'
    ]);
    Route::post('/delete/customer/appraisals', [
        'uses' => 'CustomerAppraisalController@deleteAppraisals',
        'as' => 'deleteCustomerAppraisals'
    ]);
    Route::post('/update/customer/appraisal', [
        'uses' => 'CustomerAppraisalController@updateCustomerAppraisal',
        'as' => 'updateCustomerAppraisal'
    ]);

//    Internal process Goal Setting
    Route::post('/bsc_internal/store', [
        'uses' => 'InternalAppraisalController@bscInternalStore',
        'as' => 'bsc_internal.store'
    ]);
    Route::post('/delete/internal/appraisals', [
        'uses' => 'InternalAppraisalController@deleteAppraisals',
        'as' => 'deleteInternalAppraisals'
    ]);
    Route::post('/update/internal/appraisal', [
        'uses' => 'InternalAppraisalController@updateInternalAppraisal',
        'as' => 'updateInternalAppraisal'
    ]);

//    Learning Goal Setting
    Route::post('/bsc_learning/store', [
        'uses' => 'LearningAppraisalController@bscLearningStore',
        'as' => 'bsc_learning.store'
    ]);
    Route::post('/delete/learning/appraisals', [
        'uses' => 'LearningAppraisalController@deleteAppraisals',
        'as' => 'deleteLearningAppraisals'
    ]);
    Route::post('/update/learning/appraisal', [
        'uses' => 'LearningAppraisalController@updateLearningAppraisal',
        'as' => 'updateLearningAppraisal'
    ]);

//    Appraisal Comment
    Route::get('/delete/comment/appraisal/{cID}', [
        'uses' => 'AppraisalCommentController@deleteAppraisalComment',
        'as' => 'deleteAppraisalComment'
    ]);

    Route::post('/update/comment/appraisal', [
        'uses' => 'AppraisalCommentController@updateAppraisalComment',
        'as' => 'updateAppraisalComment'
    ]);

//    Appraisal Signature
    Route::get('/delete/signature/appraisal/{signID}', [
        'uses' => 'AppraisalSignatureController@deleteAppraisalSignature',
        'as' => 'deleteAppraisalSignature'
    ]);

    Route::post('/update/signature/appraisal', [
        'uses' => 'AppraisalSignatureController@updateAppraisalSign',
        'as' => 'updateAppraisalSign'
    ]);

//    Staff Behavioural
    Route::post('/staff_behavioural/store', [
        'uses' => 'StaffBehaviouralItemController@staffBehaviouralStore',
        'as' => 'staff_behavioural.store'
    ]);

    Route::post('/staff_behavioural/update', [
        'uses' => 'StaffBehaviouralItemController@updateStaffBehavioural',
        'as' => 'updateStaffBehavioural'
    ]);

//    Staff Appraisal Start
    Route::get('/create/appraisal/{appraisalID}', [
        'uses' => 'Appraisal\StaffAppraisalController@staffAppraisalCreate',
        'as' => 'staffAppraisalCreate'
    ]);

    Route::get('/submit/appraisal/{id}', [
        'uses' => 'Appraisal\StaffAppraisalController@staffAppraisalSubmitSupervisor',
        'as' => 'staffAppraisalSubmitSupervisor'
    ]);

    Route::get('/view/appraisal/{id}', [
        'uses' => 'Appraisal\StaffAppraisalController@viewAppraisal',
        'as' => 'viewAppraisal'
    ]);

    Route::get('/update/appraisal/{appraisalID}', [
        'uses' => 'Appraisal\StaffAppraisalController@staffAppraisalEdit',
        'as' => 'staffAppraisalEdit'
    ]);

//    Financial Appraisal
    Route::post('/financial/appraisal/store', [
        'uses' => 'Appraisal\StaffFinancialAppraisalController@appraisalStore',
        'as' => 'financialAppraisalStore'
    ]);
    Route::post('/financial/appraisal/update', [
        'uses' => 'Appraisal\StaffFinancialAppraisalController@appraisalUpdate',
        'as' => 'financialAppraisalUpdate'
    ]);

//    Customer Appraisal
    Route::post('/customer/appraisal/store', [
        'uses' => 'Appraisal\StaffCustomerAppraisalController@appraisalStore',
        'as' => 'customerAppraisalStore'
    ]);
    Route::post('/customer/appraisal/update', [
        'uses' => 'Appraisal\StaffCustomerAppraisalController@appraisalUpdate',
        'as' => 'customerAppraisalUpdate'
    ]);

//    Internal Appraisal
    Route::post('/internal/appraisal/store', [
        'uses' => 'Appraisal\StaffInternalAppraisalController@appraisalStore',
        'as' => 'internalAppraisalStore'
    ]);
    Route::post('/internal/appraisal/update', [
        'uses' => 'Appraisal\StaffInternalAppraisalController@appraisalUpdate',
        'as' => 'internalAppraisalUpdate'
    ]);

//    Learning Appraisal
    Route::post('/learning/appraisal/store', [
        'uses' => 'Appraisal\StaffLearningAppraisalController@appraisalStore',
        'as' => 'learningAppraisalStore'
    ]);
    Route::post('/learning/appraisal/update', [
        'uses' => 'Appraisal\StaffLearningAppraisalController@appraisalUpdate',
        'as' => 'learningAppraisalUpdate'
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
