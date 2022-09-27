@extends('layouts.profile-box')

@section('css_links')
<link rel="stylesheet" href="/css/profile.css">
@endsection
@section('profile-box')

<div class="profile-form">
    <form action="{{ route('updateProfile' , ['user' => $user->id]) }}" method="post">
        <div class="profile-form-edit">
            @method('patch')
            @csrf
            <div class="group-box">
                <label for="">نام کاربری</label>
                <input class="input-form @error('name')  is-invalid  @enderror" type="text" name="name" value="{{$user->name}}">
                <div class="invalid-feedback center-t">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="group-box">
                <label for="">ایمیل </label>
                <input class="input-form @error('email')  is-invalid  @enderror" type="email" name="email" value="{{$user->email}}">
                <div class="invalid-feedback center-t">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="group-box">
                <label for="">شماره موبایل</label>
                <input class="input-form @error('phone')  is-invalid  @enderror" type="number" name="phone" value="{{$user->phone}}">
                <div class="invalid-feedback center-t">
                    @error('phone')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="group-box">
                <label for="">رمز عبور فعلی</label>
                <div class="password-edit-btn">
                    <input class="input-form" type="password" name="old_password" placeholder="رمز عبور فعلی">
                    <button type="button" class="button" onclick="showPassword()"><i id="edit-icon" class="fa-regular fa-pen-to-square fa-2x"></i></button>
                </div>
            </div>
            <div id="warning" style="display:none" class="warning">
                <p class="center-t">ابتدا رمز عبور فعلی خود را وارد کنید سپس رمز عبور جدید و تکرار ان را وارد کنید</p>
            </div>
            <div class="group-box password">
                <label for="">رمز عبور جدید</label>
                <input class="input-form @error('name')  is-invalid  @enderror" class="" type="password" name="new_password" placeholder="رمز عبور جدید را وارد کنید">
                <div class="invalid-feedback center-t">
                    @error('new_password')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="group-box password">
                <label for="">تکرار رمز عبور جدید</label>
                <input class="input-form @error('name')  is-invalid  @enderror" type="password" name="new_password_confirmation" placeholder="رمز عبور جدید را تکرار کنید">
                <div class="invalid-feedback center-t">
                    @error('new_password_confirmation')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="group-box textarea">
                <label for="">ادرس</label>
                <textarea class="input-form @error('address')  is-invalid  @enderror" type="text" name="address" id="" cols="30" rows="10">{{$user->address}}</textarea>
                <div class="invalid-feedback center-t">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <button class="edit-btn button" type="submit">ایجاد تغییر</button>
    </form>
</div>


<script>
    function showPassword() {
        const password = document.getElementsByClassName('password');
        document.getElementById("warning").style.display = "block";
        password[0].style.display = "block";
        password[1].style.display = "block";
    }
</script>

@if(session()->has('hash_error'))
<span>{{session('hash_error')}}</span>
@endif
@endsection