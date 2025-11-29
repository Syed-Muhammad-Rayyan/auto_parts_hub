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
}
