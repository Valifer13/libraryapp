<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'index'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    });

    Route::resource('/books', BookController::class)->middleware('auth:admin');

    Route::prefix('/loans')->middleware('auth:admin')->group(function () {
        Route::get('/borrowing', [LoanController::class, 'borrowing'])->name('loans.borrowing');
        Route::get('/return', [LoanController::class, 'returning'])->name('loans.return');
        Route::get('/history', [LoanController::class, 'history'])->name('loans.history');
    });
    Route::resource('/loans', LoanController::class)->middleware('auth:admin');
});