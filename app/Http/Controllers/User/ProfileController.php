<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public $favorite_products = [];

    public function favorites()
    {
        $favorites_products = Favorite::where('user_id', userId());
        if ($favorites_products->count() > 0) {
            foreach ($favorites_products->get() as $favorite) {
                $this->favorite_products[] = $favorite->product()->first();
            }
        }
        return view('User/Profile/favorites', ['products' => $this->favorite_products]);
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
