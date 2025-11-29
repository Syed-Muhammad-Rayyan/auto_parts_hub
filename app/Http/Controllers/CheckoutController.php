<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Show checkout page with cart items
    public function index()
    {
        $cartItems = session()->get('cart', []);

        // Debug: check what checkout sees
      //  dd($cartItems);

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

        // clear the cart
        session()->forget('cart');

        // store total in flash session for thank-you page
        return redirect()->route('checkout.thankyou')->with('total', $total);
    }

    // Show thank-you page
    public function thankyou()
    {
        // get total from flash session
        $total = session('total', 0);
        return view('pages.thankyou', compact('total'));
    }
}
