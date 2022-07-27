@extends('layouts.app')
@section('title') Product @endsection
@section('content')
<div class="container">
    <h2>{{$product->name}}</h2>
    <form action="{{ route('addFavorite' , ['id' => $product->id]) }}" method="post">
        @method('post')
        @csrf
        <button type="submit">افزودن به علاقه مندی</button>
    </form>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>نام کالا</th>
                <th>شرکت تولید کننده</th>
                <th>موجودی</th>
                <th>قیمت</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$product->name}}</td>
                <td>{{showName($product->seller_id)}}</td>
                <td>{{$product->inventory}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="/product/buy/{{$product->id}}" class="btn btn-success">Buy</a>
                </td>
            </tr>
        </tbody>
    </table>

    <div>
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
</div>
@endsection

</html>