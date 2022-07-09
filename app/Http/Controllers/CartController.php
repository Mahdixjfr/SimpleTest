<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Delivered;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $list = [];
    public $total = 0;
    public $order = 0;
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
            $this->addDelivered($cart->product_id, $this->order);
        }
        Cart::where('user_id', UserId())->delete();
        return back();
    }

    public function addDelivered($product_id)
    {
        $result = Delivered::where('user_id', userId())->orderBy('order', 'desc');
        if ($result->count() > 0) {
            $this->order =  $result->first()->order + 1;
        }
        Delivered::create([
            'user_id' =>  userId(),
            'order' => $this->order,
            'product_id' => $product_id
        ]);
    }

    public function delivered()
    {
        $last_id_delivered = Delivered::where('user_id', userId())->orderBy('order', 'desc')->first()->order;

        for ($i = 1; $i <= $last_id_delivered; $i++) {
            $delivereds[]['products'] = Delivered::where('user_id', userId())->where('order', $i)->get();
        }
        // dd($delivereds);
        foreach ($delivereds as  $value) {
            foreach ($value['products'] as  $obj) {
                $price = $obj->product()->price;
            }
        }
        return view('delivered', compact('delivereds'));
    }
}


$list = [
    'obj1' => [
        'products' => ['obj1', 'obj2'],
        'total' => 123123
    ],
    'obj2' => [
        'products' => ['obj1', 'obj2']
    ],
];
