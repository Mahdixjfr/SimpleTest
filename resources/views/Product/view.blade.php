@extends('layouts.app')
@section('title') Product @endsection
@section('content')
<div class="container">
    <h2>{{$product->name}}</h2>
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
                <td>{{show_name($product->user_id)}}</td>
                <td>{{$product->inventory}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="/product/buy/{{$product->id}}" class="btn btn-success">Buy</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

</html>