@extends('layouts.profile-box')

@section('css_links')
<link rel="stylesheet" href="/css/profile.css">
@endsection
@section('profile-box')
<div class="orders">
    <h4 class="title">سفارش های من</h4>
    <div class="order-boxes">
        <div class="order">
            <a href="{{ route('delivered') }}"><i id="icon" class="fa-solid fa-cloud-arrow-down fa-3x"></i></a>
            <span class="inf">{{$orders['delivereds_number']}} تحویل شده</span>
        </div>
        <div class="order">
            <a href="{{ route('cart') }}"><i id="icon" class="fa-solid fa-cart-shopping fa-3x"></i></a>
            <span class="inf">{{$orders['carts_number']}} سبد خرید</span>
        </div>
        <div class="order">
            <a href="{{ route('favorites') }}"><i id="icon" class="fa-regular fa-heart fa-3x"></i></a>
            <span class="inf">{{$orders['favorite_products_number']}} مورد علاقه</span>
        </div>
    </div>
</div>
<div class="favorites">
    <h3 class="title">مورد علاقه</h3>
    <div class="owl-carousel owl-theme carousel">
        @foreach($favorite_products as $product)
        <div class="item">
            <a class="product-link" href="/product/{{$product->id}}"><img class="carousel-image" src="/storage/photo/{{$product->photo}}" alt=""></a>
            <div class="carousel-name">{{$product->name}}</div>
            <div class="carousel-price">{{$product->price}} <span class="ltr">تومان</span></div>
        </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 0,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });
</script>

@endsection