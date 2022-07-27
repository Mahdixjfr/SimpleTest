<?php

use App\Models\Seller;
use App\Models\User;

if (!function_exists('showName')) {
    function showName($id)
    {
        $seller = Seller::find($id);
        return $seller->store_name;
    }
}

if (!function_exists('userId')) {
    function userId()
    {
        if (auth()->check()) {
            return auth()->user()->id;
        } else {
            return redirect('/login');
        }
    }
}

if (!function_exists('typePrice')) {
    function typePrice($value)
    {
        if ($value > 999 && $value < 999999) {
            // $number = $value / 1000;
            $number = number_format($value);
            return   ' هزار' . $number;
        } elseif ($value > 999999) {
            // $number = $value / 1000000;
            $number = number_format($value);
            return ' میلیون' . $number;
        } else {
            return $value;
        }
    }
}

if (!function_exists('unformatNumber')) {
    function unformatNumber($number)
    {
        $number =  mb_ereg_replace("[^0-9]", "", $number);
        return $number;
    }
}

if (!function_exists('findUser')) {
    function findUser($id)
    {
        $user = User::find($id);
        return $user;
    }
}

if (!function_exists('checkSeller')) {
    function checkSeller()
    {
        $user = findUser(userId());
        if ($user->type == 'seller') {
            return true;
        } else {
            return false;
        }
    }
}
