<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;


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
// Route::get('/cart', [App\Http\Controllers\CartController::class, 'viewCart'])->name('cart.view');
// Route::post('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
//     Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
//     Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
// });

Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('coupons', AdminCouponController::class);
});

Route::get('/category/{code}', [CategoryController::class, 'show'])->name('category.show');
