@extends('layouts.index')

@section('main')
<div class="main">
    <!-- <div class="row justify-content-center">
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
    </div> -->


</div>
@endsection