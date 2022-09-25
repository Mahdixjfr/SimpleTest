<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Cart;
use App\Models\Delivered;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller

{

    public $favorite_products = [];
    protected $password;
    protected $orders = [
        'favorite_products_number' => 0,
        'delivereds_number' => 0,
        'carts_number' => 0
    ];

    public function favorites()
    {
        $user = auth()->user();
        $favorites_products = Favorite::where('user_id', userId());
        if ($favorites_products->count() > 0) {
            foreach ($favorites_products->get() as $favorite) {
                $this->favorite_products[] = $favorite->product()->first();
            }
        }
        return view('User/favorites', ['products' => $this->favorite_products, 'user' => $user]);
    }

    public function addFavorite($product_id)
    {
        $result = Favorite::where('user_id', userId())->where('product_id', $product_id);
        if (request('result') == 'addFavorite') {
            Favorite::create([
                'user_id' => userId(),
                'product_id' => $product_id
            ]);
            return back();
        }
        $result->first()->delete();
        return back();
    }

    public function profile()
    {
        $user = Auth::user();
        $favorite_products = [];
        $favorite_products_id = Favorite::where('user_id', $user->id)->orderBy('id', 'desc')->take(6)->get();
        $orders['favorite_products_number'] = $favorite_products_id->count();
        $delivered = Delivered::where('user_id', $user->id);
        $orders['delivereds_number'] = ($delivered->count() > 0) ? $delivered->orderBy('id', 'desc')->first()->order : 0;
        $orders['carts_number'] = Cart::where('user_id', $user->id)->count();
        foreach ($favorite_products_id as $product) {
            $favorite_products[] = $product->product()->first();
        }
        return view('User/Profile/profile', compact('user', 'favorite_products', 'orders'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('User/Profile/edit', compact('user'));
    }

    public function update(ProfileRequest $request, User $user)
    {
        $validated_data = $request->all();
        if ($request->old_password) {
            $validated_password = Validator::make(request()->all(), [
                'old_password' => 'required',
                'new_password' => 'required|confirmed|min:8'
            ])->validated();
            if (Hash::check($validated_password['old_password'], $user->password)) {
                $this->password = ['password' => Hash::make($validated_password['new_password'])];
                $validated_data = array_merge($validated_data, $this->password);
            } else {
                return back()->with('hash_error', 'رمز عبور فعلی صحیح نمی باشد');
            }
        }

        $user->update($validated_data);
        return back();
    }
}
