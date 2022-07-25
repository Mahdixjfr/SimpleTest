<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
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

    public function favorites()
    {
        $favorites_products = Favorite::where('user_id', userId());
        if ($favorites_products->count() > 0) {
            foreach ($favorites_products->get() as $favorite) {
                $this->favorite_products[] = $favorite->product()->first();
            }
        }
        return view('User/favorites', ['products' => $this->favorite_products]);
    }

    public function addFavorite($product_id)
    {
        $result = Favorite::where('user_id', userId())->where('product_id', $product_id);
        if ($result->count() > 0) {
            $result->first()->delete();
            return back();
        }
        Favorite::create([
            'user_id' => userId(),
            'product_id' => $product_id
        ]);
        return back();
    }

    public function profile()
    {
        $user = Auth::user();
        return view('User/Profile/profile', compact('user'));
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
