<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_title',
    ];

    public function assign_book_category()
    {
        return $this->hasMany(AssignBookCategory::class);
    }

    public function shop_book_category()
    {
        return $this->hasMany(ShopBookCategory::class);
    }

}
