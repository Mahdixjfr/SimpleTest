<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'name',
        'seller_id',
        'price',
        'photo',
        'inventory',
        'description',
        'category_id'
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name
        ];
    }

    public function getPriceAttribute($value)
    {
        $price = number_format($value);
        return $price;
        // if ($value > 999 && $value < 999999) {
        //     $number = $value / 1000;
        //     $number = number_format($number);
        //     return $number . ' هزار';
        // } elseif ($value > 999999) {
        //     $number = $value / 1000000;
        //     $number = number_format($number);
        //     return $number . ' میلیون';
        // } else {
        //     return $value;
        // }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getInventory($value)
    {
        $inventory = number_format($value);
    }
}
