<?php

use App\Http\Controllers\home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [home::class, 'index']);
Route::post('/addtask', [home::class, 'create']);
Route::post('/finish/{id}', [home::class, 'update']);
Route::post('/delete/{id}', [home::class, 'destroy']);