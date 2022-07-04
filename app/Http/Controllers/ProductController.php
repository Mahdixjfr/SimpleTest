<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
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
        return view('Product/view', [
            'product' => $product
        ]);
    }

    public function Buy(Product $product)
    {
        return view('Product/buy', [
            'product' => $product
        ]);
    }

    public function adding_to_cart(Product $product)
    {
        $this->check_cart($product->id, UserId());
        if ($this->check_number(request()->all(), $product->inventory) && $this->check_cart($product->id, UserId())) {
            Cart::create([
                'user_id' => UserId(),
                'product_id' => $product->id,
                'number' => request('number')
            ]);
            dd('mahdi');
            return redirect('/');
        }
    }

    public function check_number($request, $inventory)
    {
        $validated_data = Validator::make($request, [
            'number' => ['required', 'numeric', 'min:1', "max:$inventory"]
        ])->validated();

        return true;
    }

    public function check_cart($product_id, $user_id)
    {
        $result = Cart::where('user_id', $user_id)->where('product_id', $product_id)->count();
        if ($result == 0) {
            return true;
        } else {
            $this->update_cart();
        }
    }
}
