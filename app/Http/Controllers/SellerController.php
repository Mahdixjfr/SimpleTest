<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SellerRegisterRequest;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.seller')->except('showRegisterationForm');
    }
    public function findCategorySeller()
    {
        $category = Seller::find(userId())->category()->first();
        return $category;
    }

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
        $category_name = $this->findCategorySeller()->name;
        return view('Seller/create', compact('category_name'));
    }

    public function create(ProductRequest $request)
    {
        $file = $request->photo;
        $photo = rand(10000, 100000) . $file->getClientOriginalName();
        $result = $file->move(public_path('\storage\photo'), $photo);
        $category_id = $this->findCategorySeller()->id;
        $validated_data = $request->all();
        $validated_data['photo'] = $photo;
        $product = [
            'category_id' => $category_id,
            'seller_id' => userId(),
        ];
        $product = array_merge($validated_data, $product);
        Product::create($product);
        return redirect('/');
    }

    public function products()
    {
        $products = Seller::find(userId())->products()->paginate(15);
        return view('Seller/products', compact('products'));
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return back();
    }
}
