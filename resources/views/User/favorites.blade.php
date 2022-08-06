@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th></th>
                <th>نام کالا</th>
                <th>شرکت تولید کننده</th>
                <th>موجودی</th>
                <th>قیمت</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><a href="/product/{{$product->id}}"><img src="/storage/photo/{{$product->photo}}" alt="" width="200px" height="200px"></a></td>
                <td>{{$product->name}}</td>
                <td>{{showName($product->seller_id)}}</td>
                <td>{{$product->inventory}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <form action="{{ route('addFavorite' , ['id' => $product->id]) }}" method="post">
                        @method('post')
                        @csrf
                        <button class="btn btn-danger">حذف</a>
                    </form>
                </td>
                <td>
                    <a href="/product/buy/{{$product->id}}" class="btn btn-success">Buy</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection