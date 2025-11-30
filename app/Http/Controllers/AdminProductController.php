<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str; // keep this

class AdminProductController extends Controller
{
    private $categories = [
        'Engine Parts',
        'Brake System',
        'Transmission',
        'Tires & Wheels',
        'Suspension Parts',
        'Lights',
        'Body Components',
        'Electrical Components'
    ];

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

        $categories = $this->categories; // send categories to blade
        return view('admin.products.create', compact('categories'));
    }

    // Store new product
    public function store(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'short' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->short = $request->short ?? '';
        $product->price = $request->price;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        // slug
        $product->slug = Str::slug($request->name, '-');

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    // Edit product
    public function edit(Product $product)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $categories = $this->categories; // send categories to blade
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'short' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product->name = $request->name;
        $product->short = $request->short ?? '';
        $product->price = $request->price;
        $product->category = $request->category;

        if ($request->hasFile('image')) {

            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        // slug update
        $product->slug = Str::slug($request->name, '-');

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // Delete product
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
