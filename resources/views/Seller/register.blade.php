@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/registerSeller.css">
@endsection
@section('main')

<div class="main">
    <form class="form" action="{{ route('registerSeller') }}" method="POST">
        @method('POST')
        @csrf
        <h4>ثبت نام فروشنده</h4>
        <hr style="width: 95%;">
        <div class="group-box box-one">
            <label for="">نام فروشگاه</label>
            <input class="input-form" name="store_name" placeholder="نام فروشگاه خود را وارد کنید" type="text">
        </div>

        <div class="box-two">
            <div class="group-box">
                <label for="">دسته بندی کالای ارایه دهنده</label>
                <select class="input-form" name="category_id" id="">
                    <option></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="group-box">
                <label for="">شماره موبایل</label>
                <input class="input-form" type="number" name="phone" placeholder="شماره موبایل خود را وارد کنید">
            </div>

        </div>

        <div class="group-box">
            <label for="">ادرس فروشگاه</label>
            <textarea name="address" placeholder="ادرس فروشگاه خود را وارد کنید" id="" cols="40" rows="7"></textarea>
        </div>

        <button class="button" type="submit">ثبت نام</button>
    </form>
</div>

<!-- <div class="container">
    <h2>ثبت نام فروشنده</h2>

    <form action="{{ route('registerSeller') }}" method="POST">
        @method('post')
        @csrf
        <label for="">نام فروشگاه</label>
        <input type="text" name="store_name" placeholder="نام فروشگاه خود را وارد کنید"><br>
        <label for="">دسته بندی کالای ارايه دهنده</label>
        <select name="category_id" id="" required>
            <option value=""></option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <label for="">شماره موبایل:</label>
        <input type="number" name="number" placeholder="شماره موبایل خود را وارد کنید"><br><br>
        <label for="">ادرس :</label>
        <textarea name="address" id="" cols="30" rows="10" placeholder="ادرس فروشگاه خود را وارد کنید"></textarea>
        <button type="submit">ثبت نام</button>
    </form>

    @if(session()->has('registered'))
    <span>{{session('registered')}}</span>
    @endif
</div> -->
@endsection