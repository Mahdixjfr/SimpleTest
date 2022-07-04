<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fiilable = [
        'name',
        'user_id',
        'price',
        'photo',
        'inventory',
        'description'
    ];
}
