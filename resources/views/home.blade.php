@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection
@section('title') ایران استار @endsection

@section('main')
<div class="main">
    <div class="bg-one">
        <a href=""><img class="bg-image" src="backgrounds/tablet.jpg" alt=""></a>
        <a href=""><img class="bg-image" src="backgrounds/headphone.jpg" alt=""></a>
    </div>
    <h2 class="title">جدیدترین ها</h2>
    <div class="owl-carousel owl-theme carousel">
        @foreach($newProducts as $product)
        <div class="item">
            <a class="product-link" href="/product/{{$product->id}}"><img class="carousel-image" src="storage/photo/{{$product->photo}}" alt=""></a>
            <div class="carousel-name">{{$product->name}}</div>
            <div class="carousel-price">{{$product->price}} <span class="ltr">تومان</span></div>
        </div>
        @endforeach
    </div>
    <div class="bg-two">
        <a href=""><img class="bg-image" src="backgrounds/laptopbg.jpg" alt=""></a>
        <a href=""><img class="bg-image" src="backgrounds/phonebg.jpg" alt=""></a>
        <a href=""><img class="bg-image" src="backgrounds/phonebg1.jpg" alt=""></a>
        <a href=""><img class="bg-image" src="backgrounds/watchbg.jpg" alt=""></a>
    </div>
    <h2 class="title">پر بازدیدترین ها</h2>
    <div class="owl-carousel owl-theme carousel">
        @foreach($newProducts as $product)
        <div class="item">
            <a class="product-link" href="/product/{{$product->id}}"><img class="carousel-image" src="storage/photo/{{$product->photo}}" alt=""></a>
            <div class="carousel-name">{{$product->name}}</div>
            <div class="carousel-price">{{$product->price}} <span class="ltr">تومان</span></div>
        </div>
        @endforeach
    </div>

</div>


<style>
    .owl-item {
        display: flex;
        justify-content: center;
    }
</style>










<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 0,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        })
    });
</script>
@endsection