<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthBaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('skipAuth')->group(function () {
    Route::get('auth', [AuthBaseController::class, 'index'])->name('login');
    Route::get('logout', [AuthBaseController::class, 'logout'])->name('logout');
});
