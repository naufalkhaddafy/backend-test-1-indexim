<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShiftController;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::get('/user', [AuthController::class, 'user']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/user', [AuthController::class, 'register']);
    Route::delete('/user/{user}/delete', [AuthController::class, 'destroy']);

    //Shift
    Route::resource('shift', ShiftController::class,['only' => ['index', 'store', 'update', 'destroy']]);
    // Attendance
    Route::resource('attendence', AttendanceController::class,['only' => ['index', 'store', 'update', 'destroy']]);

});


Route::any('{any}', function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Resource not found'
    ], 404);
})->where('any', '.*');
