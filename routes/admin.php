<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/auth/login', [AdminAuthController::class, 'index'])->name('admin.login');
    Route::post('/auth/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/auth/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});