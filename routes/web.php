<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::prefix('/tasks')->group(function() {
        Route::get('/', 'TasksController@index');
        Route::post('/', 'TasksController@create');
        Route::delete('/', 'TasksController@delete');
        Route::put('/', 'TasksController@update');
        Route::post('/toggle/{id}', 'TasksController@toggle');
    });

    Route::get('/', 'TasksController@daily');
    Route::get('/week', 'TasksController@week');
    Route::get('/tomorrow', 'TasksController@tomorrow');
});

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@authenticate');
Route::get('/logout', 'UserController@logout');
