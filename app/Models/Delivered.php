<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivered extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'order', 'number', 'price', 'seller_id', 'delivery_time', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
