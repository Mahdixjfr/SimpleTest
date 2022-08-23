@extends('layouts.index')
@section('title') کالا @endsection
@section('css_links')
<link rel="stylesheet" href="/css/product-view.css">
@endsection
@section('main')
<div class="main">
    <div class="product-img">
        <div class="heart">
            <button class="button heart"><i class="fa-regular fa-heart fa-2x"></i></button>
        </div>
        <img class="img" src="/storage/photo/{{ $product->photo }}" alt="">
    </div>
    <div class="product-inf">
        <h3 class="inf-item">لپ تاپ hp</h3>
        <p class="inf-item inf">فروشنده : لپ تاپ استار</p>
        <p class="inf-item inf">دسته بندی : لپ تاپ</p>
        <p class="inf-item inf">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime
            eligendi tempora natus vero repudiandae, facilis magni aperiam enim
            error sint illo ea reprehenderit vel voluptas ab in maiores dolorem
            deserunt.</p>
    </div>
    <div class="product-buy">
        <div class="buy-box">
            <p class="inf">Lorem, ipsum.</p>
            <p class="inf">Lorem, ipsum.</p>
            <p class="inf"><span class="price">{{$product->price}}</span> <span class="toman">تومان</span></p>
            <button id="btn-buy" onclick="buy()" class="btn-buy">افزودن به سبد خرید</button>
            <div id="buy" style="display: none;" class="buy">
                <form class="form-buy" action="{{ route('buyProduct' , ['product' => $product->id]) }}" method="POST">
                    <input type="number" id="input-buy" name="number" class="input-buy" value="1">
                    @method('post')
                    @csrf
                    <button type="submit" class="btn-confirm">تایید</button>
                </form>
            </div>
        </div>
    </div>
    <div class="product-related">
        <h2 class="title">کالا های مشابه</h2>
        <div class="owl-carousel owl-theme carousel">
            @foreach($products as $product)
            <div class="item">
                <a class="product-link" href="/product/{{$product->id}}"><img class="carousel-image" src="/storage/photo/{{$product->photo}}" alt=""></a>
                <div class="carousel-name">{{$product->name}}</div>
                <div class="carousel-price">{{$product->price}} <span class="ltr">تومان</span></div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="product-comments">
        <div class="title-comments">
            <h2 class="title">دیدگاه کاربران</h2>
            <button id="add-comment" class="add-comment">افزودن دیدگاه</button>
        </div>
        <div class="comments">
            <div class="comment">
                <div class="header-comment">
                    <h6>علی قلی</h6>
                    <span class="time">14/23/23</span>
                </div>
                <div class="body-comment">
                    <p class="comment-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Ipsam delectus quisquam natus qui modi velit.
                    </p>
                    <div class="action-comment">
                        <button class="button like"><span class="count-comment">2</span> <i class="fa-regular fa-thumbs-up fa-2x"></i></button>
                        <button class="button dislike"><span class="count-comment">4</span> <i class="fa-regular fa-thumbs-down fa-2x"></i></button>
                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="header-comment">
                    <h6>علی قلی</h6>
                    <span class="time">14/23/23</span>
                </div>
                <div class="body-comment">
                    <p class="comment-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Ipsam delectus quisquam natus qui modi velit.
                    </p>
                    <div class="action-comment">
                        <button class="button like"><span class="count-comment">2</span> <i class="fa-regular fa-thumbs-up fa-2x"></i></button>
                        <button class="button dislike"><span class="count-comment">4</span> <i class="fa-regular fa-thumbs-down fa-2x"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function buy() {
        document.getElementById("btn-buy").style.display = "none";
        document.getElementById("buy").style.display = "block";
    }
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