<?php

Route::middleware(['auth'])->prefix('supervisor')->group(function () {

    Route::get('/', [
        'uses' => 'SupervisorController@index',
        'as' => 'supervisor.index'
    ]);

    Route::get('/appraisal/{appraisalID}', [
        'uses' => 'SupervisorController@appraisal',
        'as' => 'supervisorViewAppraisal'
    ]);

    Route::post('/goals/{appraisalID}/approval', [
        'uses' => 'SupervisorController@goalsApproval',
        'as' => 'goalsApproval'
    ]);

    Route::get('/submit/appraisal/{appraisalID}/hr', [
        'uses' => 'SupervisorController@submitToHr',
        'as' => 'submitToHr'
    ]);

//    Supervisor - Staff Appraisal

    Route::get('/view/staff/appraisal/{appraisalID}', [
        'uses' => 'Appraisal\SupervisorAppraisalController@staffAppraisal',
        'as' => 'supervisorViewStaffAppraisal'
    ]);

    Route::post('/appraisal/{appraisalID}/approval', [
        'uses' => 'Appraisal\SupervisorAppraisalController@staffAppraisalApproval',
        'as' => 'staffAppraisalApproval'
    ]);

//    Supervisor Goals

    Route::get('/set/goals', [
        'uses' => 'SupervisorController@supervisorNewGoal',
        'as' => 'supervisorNewGoal'
    ]);

    Route::get('/dashboard/{appraisalID}', [
        'uses' => 'SupervisorController@dashboard',
        'as' => 'supervisorDashboard'
    ]);

    Route::get('/all/goals', [
        'uses' => 'SupervisorController@allAppraisals',
        'as' => 'supervisorAppraisals'
    ]);

    Route::get('/submit/appraisal/{id}', [
        'uses' => 'SupervisorController@submitAppraisalSupervisor',
        'as' => 'supervisorSubmitAppraisal'
    ]);

    Route::get('/view/goals/{id}', [
        'uses' => 'SupervisorController@viewGoals',
        'as' => 'supervisorViewGoals'
    ]);

    Route::get('/edit/appraisal/{id}', [
        'uses' => 'SupervisorController@editAppraisal',
        'as' => 'supervisorEditAppraisal'
    ]);

    Route::get('/delete/appraisal/{id}', [
        'uses' => 'SupervisorController@deleteAppraisal',
        'as' => 'supervisorDeleteAppraisal'
    ]);

    Route::get('/rejected/goals/{id}', [
        'uses' => 'SupervisorController@rejectedGoalsa',
        'as' => 'supervisorRejectedGoals'
    ]);

});