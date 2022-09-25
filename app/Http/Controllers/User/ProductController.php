<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('product');
    }

    public function product(Product $product)
    {
        $check_favorite = $this->checkFavorite($product->id);
        // dd($check_favorite);
        $main_product = $product;
        $product_category = $main_product->category()->first();
        $products = $product_category->products()->orderBY('id', 'desc')->take(12)->get();
        $comments = Comment::where('product_id', $main_product->id)->verified()->get();
        return view('Product/view', compact('main_product', 'comments', 'products', 'check_favorite'));
    }

    public function Buy(Product $product)
    {
        $number = request('number');
        $this->check_number(request()->all(), $product->inventory);
        if ($this->check_cart($product->id, userId(), $number)) {
            Cart::create([
                'user_id' => userId(),
                'product_id' => $product->id,
                'number' => $number
            ]);
        };
        $product->update([
            'inventory' => $product->inventory - $number
        ]);
        return redirect('/');
    }

    // public function adding_to_cart(Product $product)
    // {
    // }

    public function check_number($request, $inventory)
    {
        $validated_data = Validator::make($request, [
            'number' => ['required', 'numeric', 'min:1', "max:$inventory"]
        ])->validated();
    }

    public function check_cart($product_id, $user_id, $number)
    {
        $result = Cart::where('user_id', $user_id)->where('product_id', $product_id);
        if ($result->count() == 0) {
            return true;
        } else {
            $this->update_cart($result->first(), $number);
        }
    }

    public function checkFavorite($product_id)
    {
        $result = Favorite::where('user_id', userId())->where('product_id', $product_id)->count();
        if ($result > 0) {
            return true;
        }
        return false;
    }

    public function update_cart($obj, $number)
    {
        $obj->update([
            'number' => $obj->number + $number
        ]);
    }
}
