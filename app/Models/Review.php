<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'product_id',
        'customer_name',
        'customer_email',
        'rating',
        'title',
        'comment',
        'images',
        'status',
    ];

    // Cast images as JSON array
    protected $casts = [
        'images' => 'array',
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
