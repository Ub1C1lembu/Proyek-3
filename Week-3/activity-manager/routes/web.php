<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('welcome');
});

// Resource route — otomatis membuat 7 route CRUD sekaligus
Route::resource('activities', ActivityController::class);
