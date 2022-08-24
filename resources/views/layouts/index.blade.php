<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/js/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/js/owlcarousel/dist/assets/owl.theme.default.min.css">
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('css_links')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/owlcarousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/75a773a8a3.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>

<body>
    <div class="contain">
        <div class="header">
            <div class="landing-wrapper">
                <header>
                    <div class="title">
                        <h1 class="header-title">IRAN <span class="star">STAR</span></h1>
                    </div>
                    <div class="search">
                        <input type="text" name="search" class="input-search">
                    </div>
                    <div class="cart-user">
                        @if(auth()->check())
                        <div class="dropdown show">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="user" class="fa-solid fa-circle-user fa-2x"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <ul class="dropdown-list">
                                    <li class="ddown-item"><a class="ddown-link" href="{{ route('profile') }}">پنل کاربری</a></li>
                                    <li class="ddown-item"><a class="ddown-link" href="/cart">سبد خرید</a></li>
                                    <li class="ddown-item"><a class="ddown-link" href="{{ route('delivered') }}">تحویل شده</a></li>
                                    <li class="ddown-item"><a class="ddown-link" href="{{ route('favorites') }}">علاقه مندی ها</a></li>
                                    <li class="ddown-item"><a class="ddown-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            خروج از حساب کاربری
                                        </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>

                            </div>
                        </div>
                        @else
                        <div class="sign">
                            <a href="/login">ورود | ثبت نام</a>
                        </div>
                        @endif
                        <div class="cart">
                            <i id="cart-icon" class="fa-solid fa-cart-shopping fa-2x"></i>
                        </div>
                    </div>


                </header>
            </div>
            <ul class="nav-bar">
                <!-- Authentication Links -->
                <li class="dropdown show">
                    <a class=" nav-item" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        دسته بندی کالا ها
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <ul class="dropdown-list">
                            @foreach($categories as $category)
                            <li class="ddown-item"><a class="ddown-link" href="{{ route('category' , ['category' => $category->id]) }}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @if(auth()->check())
                @if(! checkSeller())
                <li class="">
                    <a class="nav-item" href="{{ route('showRegisterSeller') }}">فروشنده شو</a>
                </li>
                @endif
                @endif

            </ul>
        </div>
        @yield('main')
        <div class="footer">
            <footer></footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>