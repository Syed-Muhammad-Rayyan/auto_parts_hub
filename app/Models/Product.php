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

    // Calculate average rating
    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    // Get total review count
    public function reviewCount()
    {
        return $this->reviews()->count();
    }
}
