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
        <h3>$product->name</h3>
        <p class="inf-item">asdasd</p>
        <p class="inf-item">asdasd</p>
        <p class="inf-item">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime eligendi tempora natus vero repudiandae, facilis magni aperiam enim error sint illo ea reprehenderit vel voluptas ab in maiores dolorem deserunt.</p>
    </div>
    <div class="product-buy">C</div>
    <div class="product-related">D</div>
    <div class="product-comments">E</div>
</div>
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