<?php

namespace App\Http\Controllers\User;

use App\Models\Delivered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class DeliveredController extends Controller
{
    public $total = 0;
    public function delivered()
    {
        $delivereds = [];
        if ($this->checkDelivered()) {
            $last_id_delivered = Delivered::where('user_id', userId())->orderBy('order', 'desc')->first()->order;

            for ($i = $last_id_delivered; $i >= 1; $i--) {
                $objects = Delivered::where('user_id', userId())->where('order', $i)->get();
                foreach ($objects as $delivered) {
                    $number = $delivered->number;
                    $price = $delivered->price;
                    $this->total = $this->total + $number * $price;
                }
                $delivereds[] = [
                    'products' => $objects,
                    'total' => number_format($this->total)
                ];
            }
        }
        $user = findUser(userId());
        return view('User/delivered', compact('delivereds', 'user'));
    }

    public function checkDelivered()
    {
        $result = Delivered::where('user_id', userId())->orderBy('order', 'desc');
        if ($result->count() > 0) {
            return [$result, true];
        } else {
            return false;
        }
    }

    public function deliveredOrder(User $user, $order)
    {
        $delivereds = Delivered::where('user_id', $user->id)->where('order', $order)->orderBy('id', 'desc')->get();
        return view('User/Profile/deliveredOrder', compact('delivereds', 'user'));
    }
}
