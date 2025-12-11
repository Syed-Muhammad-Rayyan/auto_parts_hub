<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    ////////// Product Method ///////////
//    public function index(Request $request)
//    {
//        // Get the category from the query string (if any)
//        $category = $request->query('category');
//
//        if ($category) {
//            // Only products from this category
//            $products = Product::where('category', $category)->get();
//        } else {
//            // Show all products
//            $products = Product::all();
//        }
//
//        // Pass products and current category to the view
//        return view('pages.products', compact('products', 'category'));
//    }

    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        if ($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();
        } elseif ($category) {
            $products = Product::where('category', $category)->get();
        } else {
            $products = Product::all();
        }

        return view('pages.products', compact('products', 'category'));
    }



    ////////// Show Method ///////////
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.product_details', compact('product'));
    }

    ////////// Search Method ///////////
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a search keyword.');
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('search', compact('products', 'query'));
    }

    /**
     * Ajax search used by navbar dropdown.
     * Filters by name or category (and description) and returns JSON.
     */
    public function ajaxSearch(Request $request)
    {
        $query = $request->input('q');

        if (!$query || strlen($query) < 2) {
            return response()->json([]);
        }

        $results = Product::query()
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('category', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->orderBy('name')
            ->limit(8)
            ->get(['name', 'category', 'slug', 'image', 'price']);

        return response()->json($results);
    }

}
