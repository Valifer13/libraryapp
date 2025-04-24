<?php

use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\LoanController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('books', [BookController::class, 'index'])->name('books');
    Route::get('books/{slug}', [BookController::class, 'show'])->name('books.detail');
    Route::post('books/{book_id}', [LoanController::class, 'borrowing']);
    Route::get('loans', [LoanController::class, 'index'])->name('loans');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
