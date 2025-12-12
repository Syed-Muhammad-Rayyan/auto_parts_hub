<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    /**
     * Get all products
     */
    public function index(): JsonResponse
    {
        $products = Product::select('id', 'name', 'short', 'price', 'category', 'image', 'slug', 'created_at')
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products,
            'count' => $products->count()
        ]);
    }

    /**
     * Get single product by ID
     */
    public function show($id): JsonResponse
    {
        $product = Product::select('id', 'name', 'short', 'price', 'category', 'image', 'slug', 'created_at')
            ->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Search products
     */
    public function search($query): JsonResponse
    {
        if (strlen($query) < 2) {
            return response()->json([
                'success' => false,
                'message' => 'Search query must be at least 2 characters'
            ], 400);
        }

        $products = Product::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('category', 'LIKE', "%{$query}%")
              ->orWhere('short', 'LIKE', "%{$query}%");
        })
        ->select('id', 'name', 'short', 'price', 'category', 'image', 'slug')
        ->orderBy('name')
        ->limit(10)
        ->get();

        return response()->json([
            'success' => true,
            'data' => $products,
            'count' => $products->count(),
            'query' => $query
        ]);
    }
}
