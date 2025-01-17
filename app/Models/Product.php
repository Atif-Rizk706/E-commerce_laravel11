<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'quantity',
        'image',
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
}
