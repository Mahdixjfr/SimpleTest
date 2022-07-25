@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('updateProfile' , ['user' => $user->id]) }}" method="post">
        @method('patch')
        @csrf
        <label for="">نام کاربر:</label>
        <input type="text" name="name" value="{{$user->name}}"><br>
        <label for="">ایمیل :</label>
        <input type="email" name="email" value="{{$user->email}}"><br>
        <label for="">تغییر رمز عبور</label><br>
        <input type="password" name="old_password" placeholder="رمز عبور فعلی"><br>
        <input type="password" name="new_password" placeholder="رمز عبور مورد نظر">
        <input type="password" name="new_password_confirmation" placeholder=" تکرار رمز عبور مورد نظر"><br>
        <button type="submit">ایجاد تغییر</button>
    </form>
</div>

@if(session()->has('hash_error'))
<span>{{session('hash_error')}}</span>
@endif
@endsection