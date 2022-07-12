<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function favorites()
    {
        // $products = Favorite::where('user_id', userId())->product()->get();
        $products = Favorite::where('user_id', userId())->first();
        dd($products->product()->get());
        return view('User/Profile/favorites', compact('products'));
    }

    public function addFavorite($product_id)
    {
        $result = Favorite::where('user_id', userId())->where('product_id', $product_id);
        if ($result->count() > 0) {
            $result->first()->delete();
            return back();
        }
        Favorite::create([
            'user_id' => userId(),
            'product_id' => $product_id
        ]);
        return back();
    }
}
