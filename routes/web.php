<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
//use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//
//Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//Route::post('/login', [AuthController::class, 'login']);


Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


//// Routes that require authentication
//Route::middleware('auth')->group(function () {
//    Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');
//    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
//    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
//});

// Home page route
Route::get('/', [PageController::class, 'home'])->name('home');

// Products routes
// Optional category query: /products?category=Engine+Parts
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');
Route::get('/checkout/thank-you', [CheckoutController::class, 'thankyou'])->name('checkout.thankyou');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Additional pages can be added here, e.g.:
// Route::get('/about', [PageController::class, 'about'])->name('about');
