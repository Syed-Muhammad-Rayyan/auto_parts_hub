<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CartItem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share cart count with all views
        View::composer('*', function ($view) {
            $sessionId = session()->getId();
            $cartCount = CartItem::where('session_id', $sessionId)->sum('quantity');
            $view->with('cartCount', $cartCount);
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
