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
        $number = request('number');
        $this->check_number(request()->all(), $product->inventory);
        if ($this->check_cart($product->id, UserId(), $number)) {
            Cart::create([
                'user_id' => UserId(),
                'product_id' => $product->id,
                'number' => $number
            ]);
        };
        $product->update([
            'inventory' => $product->inventory - $number
        ]);
        return redirect('/');
    }

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

    public function update_cart($obj, $number)
    {
        $obj->update([
            'number' => $obj->number + $number
        ]);
    }
}
