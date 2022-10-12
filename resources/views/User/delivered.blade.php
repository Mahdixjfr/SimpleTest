@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/delivereds.css">
@endsection
@section('main')

<div class="main">
    <div class="profile-box">
        <div class="user-box">
            <span id="user-title" class="fa-solid fa-circle-user fa-3x"></span>
            <h4 class="title">{{$user->name}}</h4>
        </div>
        <ul class="ul-links">
            <li class="list-link"><i id="icon-profile" class="fa-solid fa-house-user"></i><a href="{{ route('profile') }}" class="links">پنل کاربری</a></li>
            <li class="list-link"><i id="icon-profile" class="fa-solid fa-cart-shopping"></i><a href="{{ route('cart') }}" class="links">سبد خرید</a></li>
            <li class="list-link"><i id="icon-profile" class="fa-regular fa-heart"></i><a href="{{ route('favorites') }}" class="links">مورد علاقه</a></li>
            <li class="list-link"><i id="icon-profile" class="fa-solid fa-cloud-arrow-down"></i><a href="{{ route('delivered') }}" class="links">تحویل شده</a></li>
            <li class="list-link"><i id="icon-profile" class="fa-solid fa-user-pen"></i><a href="{{ route('editProfile') }}" class="links">اطلاعات حساب کاربری</a></li>
            <li class="list-link"><i id="icon-profile" class="fa-solid fa-arrow-right-from-bracket"></i><a class="ddown-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> خروج از حساب کاربری</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
    <div class="delivereds">
        @foreach($delivereds as $delivered)
        @php
        @endphp
        <div class="delivered">
            <div class="delivered-head">
                <span class="price">{{$delivered['total']}} <span class="toman">تومان</span></span>
                <span class="inf">{{$delivered['products'][0]->updated_at->diffForHumans()}}</span>
            </div>
            <div class="delivered-body">
                @foreach($delivered['products'] as $value)
                <img class="delivered-img" src="/storage/photo/{{$value->product()->first()->photo}}" alt="">
                @endforeach
            </div>
            <div class="delivered-link">
                <a href="{{ route('deliveredOrder' , ['user' =>  userId() , 'order' => $delivered['products'][0]->order]) }}"><i id="arrow-left" class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection