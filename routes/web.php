<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('auth', [AuthController::class, 'index'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('authenticated')->group(function () {
    Route::view('/', 'web::index')->name('home');
});
