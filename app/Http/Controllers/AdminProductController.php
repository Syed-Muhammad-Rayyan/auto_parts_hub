<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str; // make sure this is at the top of your controller


class AdminProductController extends Controller
{
    // Display all products
    public function index()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return view('admin.products.create');
    }

    // Store new product in database
    public function store(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'short' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->short = $request->short ?? '';
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        // generate slug from name
        $product->slug = Str::slug($request->name, '-');

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    // Show form to edit a product
    public function edit(Product $product)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return view('admin.products.edit', compact('product'));
    }

    // Update product in database

    public function update(Request $request, Product $product)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'short' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product->name = $request->name;
        $product->short = $request->short ?? '';
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        // regenerate slug
        $product->slug = Str::slug($request->name, '-');

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }


    // Delete a product
    public function destroy(Product $product)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
