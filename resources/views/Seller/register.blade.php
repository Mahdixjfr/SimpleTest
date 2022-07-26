@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection