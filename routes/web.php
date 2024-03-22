<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupViewController;
use App\Http\Controllers\ShiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [GroupViewController::class, 'dashboard'])->name('dashboard');
    Route::get('/employee', [GroupViewController::class, 'employee'])->name('employee');
    Route::get('/shift', [GroupViewController::class, 'shift'])->name('shift');
    Route::get('/attendance', [GroupViewController::class, 'attendance'])->name('attendance');

    Route::post('/logout', [AuthController::class, 'logoutWeb'])->name('logout.web');
});

Route::get('/login', [GroupViewController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginWeb'])->name('login.web')->middleware('guest');




Route::resource('shift', ShiftController::class, ['only' => ['store', 'update', 'destroy']]);
