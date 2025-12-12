<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryApiController extends Controller
{
    /**
     * Get all categories
     */
    public function index(): JsonResponse
    {
        $categories = Category::select('id', 'name', 'description', 'created_at')
            ->orderBy('name')
            ->get();

        // Add product count for each category
        $categories->transform(function ($category) {
            $category->product_count = Product::where('category', $category->name)->count();
            return $category;
        });

        return response()->json([
            'success' => true,
            'data' => $categories,
            'count' => $categories->count()
        ]);
    }

    /**
     * Get single category by ID
     */
    public function show($id): JsonResponse
    {
        $category = Category::select('id', 'name', 'description', 'created_at')
            ->find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        // Add product count
        $category->product_count = Product::where('category', $category->name)->count();

        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

    /**
     * Get products for a specific category
     */
    public function products($id): JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $products = Product::where('category', $category->name)
            ->select('id', 'name', 'short', 'price', 'image', 'slug', 'created_at')
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'category' => $category,
                'products' => $products,
                'product_count' => $products->count()
            ]
        ]);
    }
}
