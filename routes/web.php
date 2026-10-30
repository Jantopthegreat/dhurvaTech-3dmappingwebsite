<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('/login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'store'])->name('login.store');
    });

    Route::middleware(['auth', 'admin'])->group(function (): void {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('blog', AdminBlogController::class)->except(['show']);
        Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');

Route::prefix('services')->name('services.')->group(function (): void {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{slug}', [ServiceController::class, 'show'])->name('show');
});

Route::prefix('blog')->name('blog.')->group(function (): void {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

Route::prefix('store')->name('store.')->group(function (): void {
    Route::get('/', [StoreController::class, 'index'])->name('index');
    Route::get('/{slug}', [StoreController::class, 'show'])->name('show');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
