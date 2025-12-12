<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Store a new review
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:255',
            'comment' => 'required|string|min:10|max:1000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max per image
            'images' => 'nullable|array|max:5', // Max 5 images
        ]);

        $images = [];

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/reviews'), $filename);
                    $images[] = 'reviews/' . $filename;
                }
            }
        }

        // Create the review (auto-approved)
        $review = Review::create([
            'product_id' => $product->id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'rating' => $request->rating,
            'title' => $request->title,
            'comment' => $request->comment,
            'images' => $images,
            'status' => 'approved', // Auto-approve reviews
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your review! Your review has been published successfully.',
            'review' => $review
        ]);
    }

    /**
     * Get reviews for a product
     */
    public function index(Product $product)
    {
        $reviews = $product->reviews()
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'reviews' => $reviews,
            'average_rating' => $product->averageRating(),
            'total_reviews' => $product->reviewCount(),
        ]);
    }

    /**
     * Admin: Get all reviews with pagination
     */
    public function adminIndex(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $reviews = Review::with('product')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Admin: Show single review
     */
    public function adminShow(Review $review)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $review->load('product');
        return view('admin.reviews.show', compact('review'));
    }

}
