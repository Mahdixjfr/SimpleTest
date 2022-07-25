@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        <li><a href="{{ route('delivered') }}">تحویل شده</a></li>
        <li><a href="{{ route('favorites') }}">علاقه مندی ها</a></li>
        <li><a href="{{ route('cart') }}">سبد خرید</a></li>
    </ul>
    <hr>
    <div>
        <span>نام کاربری :</span>
        <h5>{{$user->name}}</h5>
        <span>ایمیل :</span>
        <h5>{{$user->email}}</h5>
    </div>
    <a href="{{ route('editProfile') }}">تغییر پروفایل</a>
</div>
@endsection