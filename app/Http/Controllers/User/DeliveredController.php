<?php

namespace App\Http\Controllers\User;

use App\Models\Delivered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DeliveredController extends Controller
{
    public function delivered()
    {
        $delivereds = [];
        if ($this->checkDElivered()) {
            $last_id_delivered = Delivered::where('user_id', userId())->orderBy('order', 'desc')->first()->order;

            for ($i = $last_id_delivered; $i >= 1; $i--) {
                $objects = Delivered::where('user_id', userId())->where('order', $i)->get();
                foreach ($objects as $delivered) {
                    $number = $delivered->number;
                    $price = unformatNumber($delivered->product()->first()->price);
                    $this->total = $this->total + $number * $price;
                }
                $delivereds[] = [
                    'products' => $objects,
                    'total' => number_format($this->total)
                ];
            }
        }
        return view('User/Profile/delivered', compact('delivereds'));
    }

    public function checkDElivered()
    {
        $result = Delivered::where('user_id', userId())->orderBy('order', 'desc');
        if ($result->count() > 0) {
            return [$result, true];
        } else {
            return false;
        }
    }
}
