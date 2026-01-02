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

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (no middleware needed)
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected routes with middleware
    Route::middleware([\App\Http\Middleware\AdminAuth::class])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
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

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});


// Debug route (remove in production)
//Route::get('/debug-admin', function () {
//    return [
//        'session_admin_id' => session('admin_id'),
//        'session_admin_name' => session('admin_name'),
//        'all_session' => session()->all(),
//        'admin_count' => \DB::table('admins')->count(),
//        'first_admin' => \DB::table('admins')->first(),
//        'middleware_test' => session()->has('admin_id') ? 'Admin logged in' : 'Not logged in'
//    ];
//});

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

// Passport OAuth routes
Route::post('/oauth/token', [\Laravel\Passport\Http\Controllers\AccessTokenController::class, 'issueToken']);
Route::post('/oauth/token/refresh', [\Laravel\Passport\Http\Controllers\TransientTokenController::class, 'refresh']);
Route::get('/oauth/clients', [\Laravel\Passport\Http\Controllers\ClientController::class, 'index']);
Route::post('/oauth/clients', [\Laravel\Passport\Http\Controllers\ClientController::class, 'store']);
Route::put('/oauth/clients/{client_id}', [\Laravel\Passport\Http\Controllers\ClientController::class, 'update']);
Route::delete('/oauth/clients/{client_id}', [\Laravel\Passport\Http\Controllers\ClientController::class, 'destroy']);
Route::get('/oauth/scopes', [\Laravel\Passport\Http\Controllers\ScopeController::class, 'index']);
Route::get('/oauth/personal-access-tokens', [\Laravel\Passport\Http\Controllers\PersonalAccessTokenController::class, 'index']);
Route::post('/oauth/personal-access-tokens', [\Laravel\Passport\Http\Controllers\PersonalAccessTokenController::class, 'store']);
Route::delete('/oauth/personal-access-tokens/{token_id}', [\Laravel\Passport\Http\Controllers\PersonalAccessTokenController::class, 'destroy']);

// API Routes





// Passport handles authentication via OAuth routes above

// Additional pages can be added here, e.g.:
// Route::get('/about', [PageController::class, 'about'])->name('about');
