<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $list = [];
    public $total = 0;
    public function show()
    {
        $cart = Cart::where('user_id', UserId())->orderBy('id', 'desc')->get();
        foreach ($cart as $buy) {
            $product = $buy->product()->first();
            $number = $buy->number;
            $this->total = $this->total + $product->price * $number;
            $this->list[] = ['id' => $buy->id, 'name' => $product->name, 'price' => $product->price, 'number' => $number];
        }
        return view('Product/cart', [
            'list' => $this->list,
            'total' => number_format($this->total, 0, '.', ',')
        ]);
    }
    public function delete(Cart $cart)
    {
        $product = $cart->product()->first();
        $product->update(['inventory' => $product->inventory + $cart->number]);
        $cart->delete();
        return back();
    }

    public function buy()
    {
        Cart::where('user_id', UserId())->delete();
        return back();
    }
}
