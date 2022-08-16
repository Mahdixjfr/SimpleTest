@extends('layouts.index')

@section('main')
<div class="main">
    <h2 class="title">جدیدترین ها</h2>
    <div class="owl-carousel owl-theme carousel">
        @foreach($newProducts as $product)
        <div class="item">
            <a class="product-link" href="/product/{{$product->id}}"><img src="storage/photo/{{$product->photo}}" alt=""></a>
            <div class="carousel-name">{{$product->name}}</div>
            <div class="carousel-price">{{$product->price}} <span class="ltr">تومان</span></div>
        </div>
        @endforeach
    </div>
    <h2 class="title">پر بازدیدترین ها</h2>
    <div class="owl-carousel owl-theme carousel">
        @foreach($newProducts as $product)
        <div class="item">
            <a class="product-link" href="/product/{{$product->id}}"><img src="storage/photo/{{$product->photo}}" alt=""></a>
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