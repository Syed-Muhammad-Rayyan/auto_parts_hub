<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
    ];

    // Relationship with order items (optional)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relationship with user (optional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
