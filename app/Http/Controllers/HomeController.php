<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::orderBy('id', 'desc')->take(12)->get();
        // dd($newProducts);
        return view('home', [
            'newProducts' => Product::orderBy('id', 'desc')->take(12)->get(),
        ]);
    }

    public function category(Category $category)
    {
        $products = $category->products()->paginate(21);
        return view('category', compact('products', 'category'));
    }
}
