<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'products' => Product::paginate(15),
        ]);
    }

    public function category(Category $category)
    {
        $products = $category->products()->paginate(15);
        return view('category', compact('products'));
    }
}
