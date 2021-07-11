<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', 'TasksController@index');
Route::post('/tasks', 'TasksController@create');
Route::delete('/tasks', 'TasksController@delete');
Route::put('/tasks', 'TasksController@update');
Route::post('/tasks/toggle/{id}', 'TasksController@toggle');

Route::get('/', 'TasksController@daily');
