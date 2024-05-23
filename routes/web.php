<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource('products', ProductController::class)->only([
    'index', 'show'
]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class)->except([
        'show'
    ]);
});

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'submit']);

Route::get('/category/{code}', [CategoryController::class, 'show'])->name('category.show');
