@extends('layouts.index')
@section('title') کالا @endsection

<!-- <h2>{{$product->name}}</h2>
<form action="{{ route('addFavorite' , ['id' => $product->id]) }}" method="post">
    @method('post')
    @csrf
    <button type="submit">افزودن به علاقه مندی</button>
</form> -->


@section('main')
<div class="main">
    <div class="product-img">
        <div class="heart">
            <i class="fa-regular fa-heart fa-2x"></i>
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
            <div class="buy">
                <form action="{{ route('buyProduct' , ['product' => $product->id]) }}">
                    @method('post')
                    @csrf
                    <button class="btn-buy">افزودن به سبد خرید</button>
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
                    <h4>علی قلی</h4>
                    <span>14/23/23</span>
                </div>
                <div class="body-comment">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Ipsam delectus quisquam natus qui modi velit.</p>

                </div>
            </div>
        </div>
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
<!-- <div>
    <h3>نظرات</h3>

    <form action="/comment/{{$product->id}}" method="post">
        @method('post')
        @csrf
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <button type="submit">ایجاد نظر</button>
    </form>
    <ul>
        @foreach($comments as $comment)
        <h6>{{showName($comment->user_id)}}</h6>
        <li>{{$comment->comment}}</li>
        <div>{{$comment->like}}</div>
        <form action="{{ route('comment.like' , ['comment' => $comment->id ]) }}" method="post">
            @method('post')
            @csrf
            <button type="submit">like</button>
        </form>
        <div>{{$comment->dislike}}</div>
        <form action="{{ route('comment.dislike' , ['comment' => $comment->id]) }}" method="post">
            @method('post')
            @csrf
            <button type="submit">dislike</button>
        </form>
        @endforeach
    </ul>
</div>
</div> -->