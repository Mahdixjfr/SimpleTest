@extends('layouts.app')

@section('content')
<div class="container">
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
            @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{show_name($product->user_id)}}</td>
                <td>{{$product->inventory}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="/product/buy/{{$product->id}}" class="btn btn-success">Buy</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection