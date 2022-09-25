@extends('layouts.profile-box')

@section('css_links')
<link rel="stylesheet" href="/css/favorites.css">
@endsection

@section('profile-box')

<div class="favorites">
    @foreach($products as $product)
    <div class="card">
        <div class="card-image">
            <a href="/product/{{$product->id}}"><img class="img" src="/storage/photo/{{$product->photo}}" alt=""></a>
        </div>
        <div class="card-inf">
            <h5 class="product-name">{{$product->name}}</h5>
            <p class="product-price">{{$product->price}} <span class="ltr toman">تومان</span></p>
        </div>
    </div>
    @endforeach
</div>
@endsection