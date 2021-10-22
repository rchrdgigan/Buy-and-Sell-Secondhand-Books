<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'details',
        'quantity',
        'category',
        'unit_price',
        'total_amount',
        'image',
    ];

    public function shop_book()
    {
        return $this->hasMany(ShopBook::class);
    }

    public function cart_book()
    {
        return $this->hasMany(CartBook::class);
    }

    public function assign_book_category()
    {
        return $this->hasMany(AssignBookCategory::class);
    }
    
    public function shop_book_category()
    {
        return $this->hasMany(ShopBookCategory::class);
    }


}
