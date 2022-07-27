@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ثبت نام فروشنده</h2>

    <form action="{{ route('createProduct') }}" method="POST" enctype="multipart/form-data">
        @method('post')
        @csrf
        <label for="">نام :</label>
        <input type="text" name="name" placeholder="نام کالا را وارد کنید"><br>
        <label for="">قیمت :</label>
        <input type="number" name="price" placeholder="قیمت کالای را به تومان وارد کنید"><br><br>
        <label for="">موجودی کالا :</label>
        <input type="number" name="inventory" placeholder="موجودی کالا را وارد کنید">
        <label for="">تصویر کالا :</label>
        <input type="file" name="photo">
        <label for="">توضیحات :</label>
        <textarea name="description" id="" cols="30" rows="10" placeholder="توضیحات کالا را وارد کنید"></textarea>
        <p>توجه شما تنها در دسته بندی <mark>{{$category_name}}</mark> می توانید کالا ثبت کنید</p>
        <button type="submit">ثبت کالا</button>
    </form>

    @if(session()->has('registered'))
    <span>{{session('registered')}}</span>
    @endif
</div>
@endsection