<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\StudentController;

Route::get('/', [LandingController::class, 'index']);

Route::name('admin.')->prefix('admin')->group(function () {
    // Resource routes will be named admin.students.* (create, edit, index, dll)
    Route::resource('students', StudentController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
