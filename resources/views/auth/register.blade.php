@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/auth.css">
@endsection
@section('main')

<div class="main">
    <form id="register" style="display: none;" action="{{ route('register') }}" method="POST" class="auth-form register">
        @csrf
        @method('post')
        <div class="shape register-shape-one shape-one"></div>
        <div class="shape register-shape-two shape-two"></div>
        <h2 class="title">ثبت نام</h2>
        <div>
            <label for="">نام :</label>
            <input type="tetx" class="input-form @error('name') is-invalid @enderror" name="name">
            <div class="invalid-feedback center-t">
                @error('name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div>
            <label for="">ایمیل :</label>
            <input type="email" class="input-form @error('email') is-invalid @enderror" name="email">
            <div class="invalid-feedback center-t">
                @error('email')
                {{$message}}
                @enderror
            </div>
        </div>
        <div>
            <label for="">رمز ورود :</label>
            <input type="password" class="input-form @error('password') is-invalid @enderror" name="password">
            <div class="invalid-feedback center-t">
                @error('password')
                {{$message}}
                @enderror
            </div>
        </div>
        <div>
            <label for="">تکرار رمز ورود :</label>
            <input type="password" class="input-form @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
            <div class="invalid-feedback center-t">
                @error('password_confirmation')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="forget-password">
            <a href="{{ route('login') }}" class="forget-link">!!ثبت نام کرده ام!!</a>
        </div>
        <button id="phone_btn" name="phone" class="btn-auth" type="submit">ثبت نام</button>
    </form>
    <form id="register_phone" action="{{ route('register_phone') }}" method="GET" class="auth-form register-phone">
        @csrf
        @method('get')
        <div class="title-head">
            <h4 class="title center-t">ثبت نام</h4>
        </div>
        <div class="pad">
            <label for="">شماره موبایل</label>
            <input type="number" name="phone" placeholder="شماره موبایل خود را وارد کنید " class="input-form @error('phone') is-invalid @enderror">
            <div class="invalid-feedback center-t">
                @error('phone')
                {{$message}}
                @enderror
            </div>
            <button class="btn-auth" type="submit">ثبت نام</button>
        </div>
    </form>
</div>


@if($result == true)
<script>
    document.getElementById('register').style.display = "flex";
    document.getElementById('phone_btn').value = "{{$phone['phone']}}";
    document.getElementById('register_phone').style.display = "none";
</script>
@endif
@endsection