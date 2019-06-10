<?php

Route::middleware(['auth'])->prefix('supervisor')->group(function () {

    Route::get('/', [
        'uses' => 'SupervisorController@index',
        'as' => 'supervisor.index'
    ]);

    Route::get('/appraisal/{appraisalID}', [
        'uses' => 'SupervisorController@appraisal',
        'as' => 'hrViewAppraisal'
    ]);

});