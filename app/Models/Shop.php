<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact',
    ];

    public function user_shop()
    {
        return $this->hasMany(UserShop::class);
    }
    
    public function shop_book()
    {
        return $this->hasMany(ShopBook::class);
    }

    public function shop_book_category()
    {
        return $this->hasMany(ShopBookCategory::class);
    }

}
