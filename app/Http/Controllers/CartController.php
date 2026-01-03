<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('pages.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $productId = $product->id;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $request->quantity ?? 1;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity ?? 1,
            ];
        }

        // Store cart in session
        session()->put('cart', $cart);


        // Return back (comment this out while debugging)
        return redirect()->back()->with('success', 'Product added to cart!');
    }



    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->product_id;
        $quantity = $request->quantity;

        if(isset($cart[$productId])){
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated!');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->product_id;

        if(isset($cart[$productId])){
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed!');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }
}
