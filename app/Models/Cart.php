<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_book_id',
        'title',
        'unit_price',
        'quantity',
        'total_amount',
        'image',
    ];

    public function cart_book()
    {
        return $this->hasMany(CartBook::class);
    }
    
}
