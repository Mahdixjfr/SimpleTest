@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/auth.css">
@endsection
@section('main')

<div class="main">
    <form action="{{ route('register') }}" method="POST" class="auth-form register-phone">
        @csrf
        @method('post')
        <div class="title-head">
            <h4 class="title center-t">ثبت نام</h4>
        </div>
        <div class="pad">
            <label for="">شماره موبایل</label>
            <input type="number" name="phone" placeholder="شماره موبایل خود را وارد کنید " class="input-form @error('phoen') is-invalid @enderror">
            <div class="invalid-feedback center-t">
                @error('phone')
                {{$message}}
                @enderror
            </div>
            <button class="btn-auth" type="submit">ثبت نام</button>
        </div>
    </form>
</div>

@endsection