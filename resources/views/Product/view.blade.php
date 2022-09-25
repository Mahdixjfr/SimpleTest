@extends('layouts.index')
@section('title') کالا @endsection
@section('css_links')
<link rel="stylesheet" href="/css/product-view.css">
@endsection
@section('main')
<div class="main">
    <div class="product-img">
        <div class="heart">
            <form action="{{route('addFavorite' , ['id' => $main_product->id])}}" method="POST">
                @csrf
                @method('post')
                <button name="result" id="heart-btn" type="submit" value="addFavorite" class="heart button"><i id="heart-icon" class="fa-regular fa-heart fa-2x"></i></button>
            </form>
        </div>
        <img class="img" src="/storage/photo/{{ $main_product->photo }}" alt="">
    </div>
    <div class="product-inf">
        <h3 class="inf-item">{{$main_product->name}}</h3>
        <p class="inf-item">فروشنده : {{showName($main_product->seller_id)}}</p>
        <p class="inf-item">دسته بندی : {{getCategoryName($main_product->category_id)}}</p>
        <p class="inf-item">{{$main_product->description}}</p>
    </div>
    <div class="product-buy">
        <div class="buy-box">
            <p class="inf">{{$main_product->name}}</p>
            <p class="inf"> موجودی : {{$main_product->inventory}}</p>
            <p class="inf"><span class="price">{{$main_product->price}}</span> <span class="toman">تومان</span></p>
            <button id="btn-buy" onclick="buy()" class="btn-buy">افزودن به سبد خرید</button>
            <div id="buy" style="display: none;" class="buy">
                <form class="form-confirm" action="{{ route('buyProduct' , ['product' => $main_product->id]) }}" method="POST">
                    <input type="number" id="input-buy" name="number" class="input-form @error('number')  is-invalid @enderror" value="1">
                    <div class="invalid-feedback center-t">
                        @error('number')
                        {{$message}}
                        @enderror
                    </div>
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
            <button id="add-comment" onclick="create_comment()" class="add-comment">افزودن دیدگاه</button>
        </div>
        <div id="create-comment" class="create-comment" style="display: none;">
            <form class="form-comment" action="/comment/{{$main_product->id}}" method="post">
                @csrf
                @method('post')
                <textarea class="input-form @error('comment') is-invalid  @enderror" name="comment" id="" cols="30" rows="10" placeholder="نظر خود را بنویسید"></textarea>
                <div class="invalid-feedback center-t">
                    @error('comment')
                    {{$message}}
                    @enderror
                </div>
                <button type="submit" class="btn-confirm btn-comment">تایید</button>
            </form>
        </div>
        <div class="comments">
            @foreach($comments as $comment)
            <div class="comment">
                <div class="header-comment">
                    <h6>{{$comment->user()->first()->name}}</h6>
                    <span class="time">{{$comment->updated_at}}</span>
                </div>
                <div class="body-comment">
                    <p class="comment-text">{{$comment->comment}}</p>
                    <div class="action-comment">
                        <form method="POST" action="{{ route('comment.like' , ['comment' => $comment->id]) }}">
                            @csrf
                            @method('post')
                            <button class="button like"><span class="count-comment">{{$comment->like}}</span> <i class="fa-regular fa-thumbs-up fa-2x"></i></button>
                        </form>
                        <form method="POST" action="{{ route('comment.dislike' , ['comment' => $comment->id]) }}">
                            @csrf
                            @method('post')
                            <button class="button dislike"><span class="count-comment">{{$comment->dislike}}</span> <i class="fa-regular fa-thumbs-down fa-2x"></i></button>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@error('number')
<script>
    document.getElementById("btn-buy").style.display = "none";
    document.getElementById("buy").style.display = "block";
</script>
@enderror

@error('comment')
<script>
    document.getElementById("create-comment").style.display = "block";
</script>
@enderror

@if($check_favorite == true)
<script>
    $(document).ready(function() {
        const heart = document.getElementById("heart-icon");
        const heart_btn = document.getElementById("heart-btn");
        heart.className = "fa-solid fa-heart fa-2x";
        heart_btn.value = "deleteFavorite";
    });
</script>
@endif

<script>
    function create_comment() {
        document.getElementById("create-comment").style.display = "block";
    }

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