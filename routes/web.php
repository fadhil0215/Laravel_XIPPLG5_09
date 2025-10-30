<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [LandingController::class, 'index']);
/* Dwi Harinda */

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
/*Dwi Harinda*/