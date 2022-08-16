<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="js/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="js/owlcarousel/dist/assets/owl.theme.default.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/bootstrap.js') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/owlcarousel/dist/owl.carousel.min.js"></script>

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
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->





</body>

</html>