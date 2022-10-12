@extends('layouts.profile-box')

@section('css_links')
<link rel="stylesheet" href="/css/delivereds.css">
@endsection
@section('profile-box')

<div class="delivered-orders">
    <div class="delivered-date">
        <p class="inf">وضعیت : دریافت شده <i id="check-icon" class="fa-regular fa-circle-check fa-2x"></i></p>
        @php
        use Carbon\Carbon;
        @endphp
        <p class="inf">{{$delivereds[0]->updated_at->diffForHumans()}}</p>
    </div>
    @foreach($delivereds as $delivered)
    <div class="delivered">
        <a href="{{ route('product' , ['product' => $delivered->product()->first()->id]) }}" class="delivered-img"><img class="img" src="/storage/photo/{{$delivered->product()->first()->photo}}" alt=""></a>
        <div class="delivered-inf">
            @php
            $product = $delivered->product()->first();
            @endphp
            <h4 class="title">{{$product->name}}</h4>
            <p class="inf">فروشنده : {{showName($product->seller_id)}}</p>
            <p class="inf">دسته بندی : {{getCategoryName($product->category_id)}}</p>
            <p class="inf"> تعداد : {{$delivered->number}}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection