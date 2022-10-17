<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\photoRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SellerRegisterRequest;
use App\Models\Delivered;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class SellerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.seller');
    }
    public function findCategorySeller()
    {
        $category = Seller::find(userId())->category()->first();
        return $category;
    }

    public function showRegisterationForm()
    {
        if ($this->checkSeller() == true) {
            return redirect('/');
        }
        return view('Seller/register');
    }

    public function register(SellerRegisterRequest $request)
    {
        $validated_data = $request->all();
        $list = ['user_id' => userId()];
        $validated_data = array_merge($validated_data, $list);
        Seller::create($validated_data);
        $user = findUser(userId());
        $user->update(['type' => UserType::Seller]);
        return redirect('/');
    }

    public function store()
    {
        // $this->checkUploadImg();
        $category_name = $this->findCategorySeller()->name;
        return view('Seller/create', compact('category_name'));
    }

    public function uploadImg(photoRequest $request)
    {
        // dd($request->all());
        session()->put('photo', request('photo'));
        // dd('mahdi');
        return redirect('/');
    }

    public function checkUploadImg()
    {
        if (request('photo') != '') {
            dd(request('photo'));
            $validated_data = Validator::make(request()->all(), [
                'photo' => 'required|mimes:jpeg,png,jpg,gif'
            ])->validate();
            dd($validated_data);
        }
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

    public function sold()
    {
        $products = Delivered::where('seller_id', userId())->paginate(15);
        return view('Seller/sold', compact('products'));
    }

    public function checkSeller()
    {
        $user = findUser(userId());
        if ($user->type == UserType::Seller) {
            return true;
        }
        return false;
    }
}
