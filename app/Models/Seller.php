<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'phone', 'address', 'store_name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return  $this->hasMany(Product::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
