<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', [AuthController::class, 'profile']);

