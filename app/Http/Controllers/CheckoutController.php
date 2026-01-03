<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Show checkout page with cart items
    public function index()
    {
        $cartItems = session()->get('cart', []);


        return view('pages.checkout', compact('cartItems'));
    }


    // Submit order
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_amount' => $total,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // clear the cart
        session()->forget('cart');

        // store order id and total in flash session for thank-you page
        return redirect()->route('checkout.thankyou')->with(['total' => $total, 'order_id' => $order->id]);
    }

    // Show thank-you page
    public function thankyou()
    {
        // get total from flash session
        $total = session('total', 0);
        return view('pages.thankyou', compact('total'));
    }
}
