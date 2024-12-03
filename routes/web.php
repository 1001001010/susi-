<?php

use App\Http\Controllers\{ProfileController, AdminController, CategoryController,
    DishController, BasketController, OrderController};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DishController::class, 'index'])->name('index');


Route::get('/about', function() {
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
    Route::post('/basket', [BasketController::class, 'upload'])->name('basket.upload');
    Route::post('/order', [OrderController::class, 'upload'])->name('order.upload');
    Route::delete('/basket', [BasketController::class, 'delete'])->name('basket.delete');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/history', [ProfileController::class, 'history'])->name('profile.history');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/search', [DishController::class, 'search'])->name('search');

Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/admin/categories', [AdminController::class, 'category'])->name('admin.category');
    Route::get('/admin/menu', [AdminController::class, 'menu'])->name('admin.menu');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');

    Route::post('/admin/categories/upload', [CategoryController::class, 'upload'])->name('category.upload');

    Route::post('/admin/dish/upload', [DishController::class, 'upload'])->name('dish.upload');
});

require __DIR__.'/auth.php';
