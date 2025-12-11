<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ensure admin is logged in
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        // Get statistics
        $stats = [
            'total_products' => Product::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'new_messages' => ContactMessage::where('status', 'pending')->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total_amount') ?? 0,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
