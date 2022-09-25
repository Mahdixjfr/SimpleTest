@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/cart.css">
@endsection
@section('title') سبد خرید شما @endsection
@section('main')


<div class="main">
    <div class="carts">
        @foreach($list as $product)
        <div class="cart">
            <div class="product-img">
                <a href="/product/{{$product->id}}"><img src="/storage/photo/{{$product->photo}}" alt="" class="img"></a>
            </div>
            <div class="inf-box">
                <h4 class="title">{{$product->name}}</h4>
                <p class="inf-item">فروشنده : {{showName($product->seller_id)}}</p>
                <p class="inf-item">دسته بندی : {{getCategoryName($product->category_id)}}</p>
                <p class="inf-item"> تعداد : {{$product->number}}</p>
            </div>
            <div class="delete-button">
                <form action="{{ route('deleteCart' , ['cart' => $product->cart_id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn-delete">حذف</button>
                </form>
            </div>
            <div class="price">
                <p class="inf-item"><span class="price">{{$product->price}}</span> <span class="toman">تومان</span></p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="card-buy">
        <div class="card-landing">
            <div class="card">
                <p class="inf-item">خرید خود را نهایی کنید</p>
                <p class="inf-item">جمع سبد خرید : <span class="price">{{$total}}</span> <span class="toman">تومان</span></p>
                <form class="form-buy" method="POST" action="/cart">
                    @csrf
                    @method('post')
                    <button class="btn-buy">خرید</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <h2>Your Cart</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>نام کالا</th>
                <th>قیمت کالا</th>
                <th>تعداد</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $cart)
            <tr>
                <td>{{$cart['name']}}</td>
                <td>{{$cart['price']}}</td>
                <td>{{$cart['number']}}</td>
                <form action="/cart/{{$cart['id']}}" method="post">
                    @method('delete')
                    @csrf
                    <th><button>حذف</button></th>
                </form>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td>{{$total}} تومان</td>
            </tr>
        </tbody>
    </table>
    <form action="/cart" method="post">
        @method('post')
        @csrf
        <button value="{{$total}}">خرید نهایی</button>
    </form>
</div> -->
@endsection