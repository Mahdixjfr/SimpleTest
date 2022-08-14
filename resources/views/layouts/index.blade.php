<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="contain">
        <div class="header">
            <header>
                <div class="title">
                    <h1 class="header-title">IRAN <span class="star">STAR</span></h1>
                </div>
                <div class="search">
                    <input type="text" name="search" class="input-search">
                </div>
                <div class="sign">
                    <a href="/login">ورود | ثبت نام</a>
                </div>
            </header>
            <ul class="nav-bar">
                <li class="nav-item">link 1</li>
                <li class="nav-item">link 2</li>
                <li class="nav-item">link 3</li>
                <li class="nav-item">link 4</li>
            </ul>
        </div>
        @yield('main')
        <div class="footer">
            <footer></footer>
        </div>
    </div>
</body>

</html>