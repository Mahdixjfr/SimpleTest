@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/auth.css">
@endsection
@section('main')

<div class="main">
    <form action="{{ route('register') }}" method="POST" class="auth-form register">
        @csrf
        @method('post')
        <div class="shape register-shape-one shape-one"></div>
        <div class="shape register-shape-two shape-two"></div>
        <h2 class="title">ثبت نام</h2>
        <div>
            <label for="">نام :</label>
            <input type="tetx" class="input-form" name="name">
        </div>
        <div>
            <label for="">ایمیل :</label>
            <input type="email" class="input-form" name="email">
        </div>
        <div>
            <label for="">رمز ورود :</label>
            <input type="password" class="input-form" name="password">
        </div>
        <div>
            <label for="">تکرار رمز ورود :</label>
            <input type="password" class="input-form" name="password_confirmation">
        </div>
        <div class="forget-password">
            <a href="{{ route('login') }}" class="forget-link">!!ثبت نام کرده ام!!</a>
        </div>
        <button class="btn-auth" type="submit">ثبت نام</button>
    </form>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection