<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', 'TasksController@index');
