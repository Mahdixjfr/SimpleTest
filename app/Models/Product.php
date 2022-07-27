<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'seller_id',
        'price',
        'photo',
        'inventory',
        'description'
    ];

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

    public function getInventory($value)
    {
        $inventory = number_format($value);
    }
}
