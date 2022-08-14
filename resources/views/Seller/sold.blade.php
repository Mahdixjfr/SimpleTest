@extends('layouts.app')

@section('content')
<div class="container">
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
                                <th>مجموع</th>
                                <th>تعداد</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><a href="/product/{{$product->id}}"><img src="/storage/photo/{{getPhotoProductById($product->id)}}" alt="" width="200px" height="200px"></a></td>
                                <td><a href="/product/{{$product->id}}">{{getNameProductById($product->id)}}</a></td>
                                <td>{{ countTotal($product->price , $product->number) }}</td>
                                <td>{{$product->number}}</td>
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
</div>
@endsection