<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventLoginIfAuthenticated;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('users.dashboard') : redirect()->route('login');
})->name('home');

Route::middleware(['web'])->group(function () {
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);

    Route::get('login', [AuthController::class, 'showLoginForm'])
        ->middleware(PreventLoginIfAuthenticated::class)
        ->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('pay/{appointment}', [PaymentController::class, 'pay'])->name('pay');
    Route::post('payment/callback', [PaymentController::class, 'callback']);
});

Route::middleware('auth')->group(function () {

    /* ADMIN */
    Route::middleware('admin')->group(function () {
        Route::get('admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        
        Route::prefix('admin/appointments')->group(function () {
            Route::get('/', [AppointmentController::class, 'index'])->name('admin.appointments.index');
            Route::delete('/{appointment}', [AppointmentController::class, 'destroy'])->name('admin.appointments.destroy');
        });

        Route::prefix('admin/categories')->group(function () {
            Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
            Route::get('create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
            Route::post('store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
            Route::get('{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
            Route::put('{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
            Route::delete('{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
        });

        Route::prefix('admin/products')->group(function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('admin.products.index');
            Route::get('create', [AdminProductController::class, 'create'])->name('admin.products.create');
            Route::post('store', [AdminProductController::class, 'store'])->name('admin.products.store');
            Route::get('{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
            Route::put('{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
            Route::delete('{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
        });
    });

    /* USER */
    Route::middleware('user')->group(function () {
        Route::get('user', [UserController::class, 'dashboard'])->name('users.dashboard');

        Route::get('categories', [UserController::class, 'allCategories'])->name('categories.all');
        Route::get('categories/{category}', [UserController::class, 'showCategory'])->name('categories.show');
        Route::post('categories/{category}', [AppointmentController::class, 'store'])->name('appointments.store');

        Route::get('appointments', [AppointmentController::class, 'indexUser'])->name('appointments.indexUser');

        Route::get('products', [UserProductController::class, 'index'])->name('products.all');
        Route::post('products/{product}/add-to-cart', [UserCartController::class, 'addToCart'])->name('user.products.addToCart');
        
        Route::get('pay/{appointment}', [PaymentController::class, 'pay'])->name('pay');
        Route::post('payment/callback', [PaymentController::class, 'callback']);
    });
});

Route::get('/unauthorized', function () {
    return 'Unauthorized';
});
