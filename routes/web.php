<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminContactController;
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

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Products CRUD
    Route::resource('products', AdminProductController::class);

    // Categories CRUD
    Route::resource('categories', AdminCategoryController::class);

    // Orders (view + status update)
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);

    // Contacts (view + reply/status)
    Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'update']);
});


// Debug route
Route::get('/debug-admin', function () {
    return [
        'session_admin_id' => session('admin_id'),
        'session_admin_name' => session('admin_name'),
        'all_session' => session()->all(),
        'admin_count' => \DB::table('admins')->count(),
        'first_admin' => \DB::table('admins')->first()
    ];
});

// Home page route
Route::get('/', [PageController::class, 'home'])->name('home');

// Products routes
// Optional category query: /products?category=Engine+Parts
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/products/search-ajax', [ProductController::class, 'ajaxSearch'])->name('products.ajaxSearch'); // Must come before {slug} route
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
