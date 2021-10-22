<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopBookCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'book_id',
        'category_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
