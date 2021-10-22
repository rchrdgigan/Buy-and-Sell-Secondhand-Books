<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'unit_price',
        'quantity',
        'total_price',
        'status',
        'reason'
    ];

    public function user_transaction()
    {
        return $this->hasMany(UserTransaction::class);
    }

}
