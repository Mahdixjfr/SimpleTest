<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Delivered;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $list = [];
    public $total = 0;
    public function show()
    {
        $cart = Cart::where('user_id', userId())->orderBy('id', 'desc')->get();
        foreach ($cart as $buy) {
            $product = $buy->product()->first();
            $number = $buy->number;
            $price = unformatNumber($product->price);
            $this->total = $this->total + $price * $number;
            $this->list[] = ['id' => $buy->id, 'name' => $product->name, 'price' => $product->price, 'number' => $number];
        };
        // $total = number_format($this->total, 0, '.', ',');
        return view('Product/cart', [
            'list' => $this->list,
            'total' => number_format($this->total)
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
        $carts = Cart::where('user_id', userId())->get();
        foreach ($carts as  $cart) {
        }
        $list = [];
        $this->addDelivered();
        Cart::where('user_id', UserId())->delete();
        return back();
    }

    public function addDelivered($list)
    {
        Delivered::create($list);
    }
}
