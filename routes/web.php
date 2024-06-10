<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventLoginIfAuthenticated;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])
    ->middleware(PreventLoginIfAuthenticated::class)
    ->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    Route::middleware('user')->group(function () {
        Route::get('user', [UserController::class, 'dashboard'])->name('user.dashboard');
    });
});

Route::get('/unauthorized', function () {
    return 'Unauthorized';
});
