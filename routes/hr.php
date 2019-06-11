<?php

Route::middleware(['auth'])->prefix('hr')->group(function () {

    Route::get('/', [
        'uses' => 'HrController@index',
        'as' => 'hr.index'
    ]);

    Route::get('/behavioural/items', [
        'uses' => 'HrController@behaviouralItems',
        'as' => 'hr.behavioural.items'
    ]);

    Route::resource('behavioural', 'BehaviouralController');
    Route::resource('behavioural_item', 'BehaviouralItemController');
    Route::resource('levels', 'LevelController');

});