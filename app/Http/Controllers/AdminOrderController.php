<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $status = $request->get('status', 'pending');
        $orders = Order::with('items.product')
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function show(Order $order, Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $order->load('items.product');
        $currentStatus = $request->get('status', 'pending');
        return view('admin.orders.show', compact('order', 'currentStatus'));
    }

    public function update(Request $request, Order $order)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'status' => 'required|in:pending,completed',
        ]);

        $order->status = $request->status;
        $order->save();

        $status = $request->get('status', 'pending');
        return redirect()->route('admin.orders.show', ['order' => $order->id, 'status' => $status])
            ->with('success', 'Order status updated successfully.');
    }
}



