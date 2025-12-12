<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment
    protected $fillable = [
        'slug', 'name', 'price', 'short', 'image', 'description', 'category'
    ];

    // Relationship with Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Get approved reviews
    public function approvedReviews()
    {
        return $this->hasMany(Review::class)->where('status', 'approved');
    }

    // Calculate average rating
    public function averageRating()
    {
        return $this->approvedReviews()->avg('rating') ?? 0;
    }

    // Get total review count
    public function reviewCount()
    {
        return $this->approvedReviews()->count();
    }
}
