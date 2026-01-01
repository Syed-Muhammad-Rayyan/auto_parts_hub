<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        if ($query) {
            $products = Product::with('categoryRelation')
                ->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();
        } elseif ($category) {
            $products = Product::with('categoryRelation')
                ->whereHas('categoryRelation', function($q) use ($category) {
                    $q->where('name', $category);
                })
                ->get();
        } else {
            $products = Product::with('categoryRelation')->get();
        }

        $categories = Category::all();
        return view('pages.products', compact('products', 'category', 'categories'));
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

        $results = Product::with('category')
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhereHas('category', function($catQuery) use ($query) {
                      $catQuery->where('name', 'LIKE', "%{$query}%");
                  })
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->orderBy('name')
            ->limit(8)
            ->get(['name', 'slug', 'image', 'price']);

        return response()->json($results);
    }

}
