<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Delivered;
use Illuminate\Http\Request;
use App\Http\Controllers\User\DeliveredController;
use Carbon\Carbon;

class CartController extends Controller
{
    public $list = [];
    public $total = 0;
    public $order = 1;
    public function show()
    {
        $cart = Cart::where('user_id', userId())->orderBy('id', 'desc')->get();
        foreach ($cart as $buy) {
            $product = $buy->product()->first();
            $price = unformatNumber($product->price);
            $number = $buy->number;
            $product->number = $number;
            $product->cart_id = $buy->id;
            $this->list[] = $product;
            $this->total = $this->total + $price * $number;
        };
        return view('User/cart', [
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

    public function formBuy()
    {
        $total = 0;
        $carts = Cart::where('user_id', userId())->orderBy('id', 'desc')->get();
        $time = Carbon::now();;
        $start = Carbon::tomorrow();
        $end = $time->addDays(5);
        for ($i = $start; $i <= $end; $i->modify('+1 day')) {
            $date[$i->toDateString()] = [
                'day' => $i->day,
                'week' => $i->format('l'),
            ];
        }
        foreach ($carts as $cart) {
            $total = $total + unformatNumber($cart->product()->first()->price) * $cart->number;
        }
        return view('Product.buy', compact('carts', 'date', 'total'));
    }

    public function buy()
    {
        $carts = Cart::where('user_id', userId())->get();

        $Delivered = new DeliveredController();
        if ($result = $Delivered->checkDelivered()) {
            $this->order =  $result[0]->first()->order + 1;
        }
        $time = new Carbon(request('time'));
        foreach ($carts as  $cart) {
            $this->addDelivered($cart->product()->first(), $cart->number, $time);
        }
        Cart::where('user_id', UserId())->delete();
        return redirect('/');
    }

    public function addDelivered($product, $number, $time)
    {
        Delivered::create([
            'user_id' =>  userId(),
            'seller_id' => $product->seller_id,
            'delivery_time' => $time,
            'number' => $number,
            'order' => $this->order,
            'product_id' => $product->id,
            'price' => unformatNumber($product->price)
        ]);
    }
}
