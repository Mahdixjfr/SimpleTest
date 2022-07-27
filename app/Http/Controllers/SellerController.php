<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SellerRegisterRequest;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function showRegisterationForm()
    {
        return view('Seller/register');
    }

    public function register(SellerRegisterRequest $request)
    {
        $validated_data = $request->all();
        if ($this->checkRegistered(userId())) {
            $list = ['user_id' => userId()];
            $validated_data = array_merge($validated_data, $list);
            Seller::create($validated_data);
            $user = findUser(userId());
            $user->update(['type' => 'seller']);
            return redirect('/');
        } else {
            return back()->with('registered', 'شما قبلا ثبت نام کرده اید');
        }
    }

    public function checkRegistered($id)
    {
        $seller = Seller::where('user_id', $id)->count();
        if ($seller > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function store()
    {
        return view('Seller/create');
    }

    public function create(ProductRequest $request)
    {
        $file = $request->photo;
        $result = $file->move(public_path('/storage/photo/'), $file->getClientOriginalName());
        dd($result);
    }
}
