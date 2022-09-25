@extends('layouts.index')
@section('css_links')
<link rel="stylesheet" href="/css/category.css">
@endsection
@section('main')
<div class="main">
    <div class="categories">
        <h4 class="title center">دسته بندی ها</h4>
        <ul class="list">

            @php
            $main_category_id = $category->id;
            @endphp
            @foreach($categories as $category)
            <li class="{{ ($main_category_id == $category->id) ? 'category-active' :  '' }} list-item"><a href="{{ route('category' , ['category' => $category->id]) }}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="category">
        @foreach($products as $product)
        <div class="card">
            <div class="card-image">
                <a href="/product/{{$product->id}}"><img class="img" src="/storage/photo/{{$product->photo}}" alt=""></a>
            </div>
            <div class="card-inf">
                <h5 class="product-name">{{$product->name}}</h5>
                <p class="product-price">{{$product->price}} <span class="ltr toman">تومان</span></p>
            </div>
        </div>
        @endforeach

    </div>
    <div class="paginate">
        <div class="d-flex justify-content-center">
            {!! $products->links() !!}
        </div>
    </div>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>نام محصول</th>
                                <th>قیمت</th>
                                <th>موجودی</th>
                                <th>توضیحات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><a href="/product/{{$product->id}}"><img src="/storage/photo/{{$product->photo}}" alt="" width="200px" height="200px"></a></td>
                                <td><a href="/product/{{$product->id}}">{{$product->name}}</a></td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->inventory}}</td>
                                <td>{{$product->description}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection