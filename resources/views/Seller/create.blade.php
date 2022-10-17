@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/create_product.css">
@endsection
@section('main')
<div class="main">

    <form style="display: none;" class="inf-form" action=" {{ route('createProduct') }}" method="POST" enctype="multipart/form-data">
        @method('post')
        @csrf
        <h2>ایجاد محصول</h2>
        <div class="f-column center-a">
            <label for="">نام</label>
            <input class="input-form name-input" type="text" name="name" placeholder="نام کالا را وارد کنید">
        </div>
        <div class="group-box f-row around-row-j">
            <div class="f-column center-a">
                <label for="">قیمت</label>
                <input class="input-form" type="number" name="price" placeholder="قیمت کالای را به تومان وارد کنید">
            </div>
            <div class="f-column center-a">
                <label for="">موجودی کالا</label>
                <input class="input-form" type="number" name="inventory" placeholder="موجودی کالا را وارد کنید">
            </div>
        </div>
        <div class="f-column center-a">
            <label for="">توضیحات</label>
            <textarea class="input-form" name="description" id="" cols="40" rows="7" placeholder="توضیحات کالا را وارد کنید"></textarea>
        </div>
        <p>توجه شما تنها در دسته بندی <mark>{{$category_name}}</mark> می توانید کالا ثبت کنید</p>
        <button type="button" class="confirm-form">تایید</button>
    </form>
    <form class="img-form" action="{{ route('uploadImg') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <p class="upload-text">لطفا عکس کالای خود را اپلود کنید</p>
        <label class="img-label" for="inputTag">
            Select Image
            <input id="inputTag" name="photo" class="input-img" type="file" />
            <span id="imageName"></span>
        </label>
        <button class="confirm-form" type="submit">تایید</button>
        @error('photo')
        <span>{{$message}}</span>
        @enderror
    </form>

    <script>
        let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", () => {
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
    </script>
</div>

@if(session()->has('registered'))
<span>{{session('registered')}}</span>
@endif
</div>
@endsection