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
use App\Http\Controllers\ReviewController;
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

    // Reviews management (view only)
    Route::get('/reviews', [ReviewController::class, 'adminIndex'])->name('reviews.index');
    Route::get('/reviews/{review}', [ReviewController::class, 'adminShow'])->name('reviews.show');
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

// About and Terms pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

// Products routes
// Optional category query: /products?category=Engine+Parts
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/products/search-ajax', [ProductController::class, 'ajaxSearch'])->name('products.ajaxSearch'); // Must come before {slug} route
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Reviews routes
Route::get('/products/{product}/reviews', [ReviewController::class, 'index'])->name('products.reviews');
Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('products.reviews.store');

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

// API Routes
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;

Route::prefix('api')->group(function () {
    // Products API
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/{id}', [ProductApiController::class, 'show']);
    Route::get('/products/search/{query}', [ProductApiController::class, 'search']);

    // Categories API
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
    Route::get('/categories/{id}/products', [CategoryApiController::class, 'products']);
});

// Additional pages can be added here, e.g.:
// Route::get('/about', [PageController::class, 'about'])->name('about');
