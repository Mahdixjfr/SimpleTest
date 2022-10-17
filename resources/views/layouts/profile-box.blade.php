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

    <title>ایران استار</title>
</head>

<body>
    <div class="contain">
        <div class="header">
            <div class="landing-wrapper">
                <header>
                    <div class="title">
                        <a href="/">
                            <h1 class="header-title"><span>IRAN</span> <span class="star">STAR</span></h1>
                        </a>
                    </div>
                    <div class="search">
                        <form action="" method="get">
                            <button class="search-btn" type="submit"><i class=" fa-solid fa-magnifying-glass"></i></button>
                            <input id="search" type="text" name="search" placeholder="جستجو" class="input-search">
                        </form>
                    </div>
                    <div class="cart-user">
                        @if(auth()->check())
                        <div class="dropdown show">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="user" class="fa-solid fa-circle-user fa-2x"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <ul class="dropdown-list">
                                    <li class="ddown-item"><i id="icon-profile" class="fa-solid fa-house-user"></i><a class="ddown-link" href="{{ route('profile') }}">پنل کاربری</a></li>
                                    <li class="ddown-item"><i id="icon-profile" class="fa-solid fa-cart-shopping"></i><a class="ddown-link" href="/cart">سبد خرید</a></li>
                                    <li class="ddown-item"><i id="icon-profile" class="fa-solid fa-cloud-arrow-down"></i><a class="ddown-link" href="{{ route('delivered') }}">تحویل شده</a></li>
                                    <li class="ddown-item"><i id="icon-profile" class="fa-regular fa-heart"></i><a class="ddown-link" href="{{ route('favorites') }}">مورد علاقه</a></li>
                                    <li class="ddown-item"><i id="icon-profile" class="fa-solid fa-arrow-right-from-bracket"></i><a class="ddown-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            خروج از حساب کاربری
                                        </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>

                            </div>
                        </div>
                        <div class="cart-icon">
                            <div class="cart-div">
                                <i id="cart-icon" class="fa-solid fa-cart-shopping fa-2x"></i>
                                <!-- <button class="dropbtn">Dropdown</button> -->
                                <div class="dropdown-content">
                                    <a href="{{ route('cart') }}">مشاهده سبد خرید</a>
                                    <div class="carts-box">
                                        @php
                                        $total = 0;
                                        $header_carts = [];
                                        if(auth()->check() == true)
                                        {
                                        $header_carts = App\Models\Cart::where('user_id', Auth::user()->id)->get();
                                        }
                                        @endphp
                                        @foreach($header_carts as $header_cart)
                                        @php
                                        $total = $total + unformatNumber($header_cart->product()->first()->price) * $header_cart->number;
                                        @endphp
                                        <div class="cart-box">
                                            <div class="cart-group">
                                                <div class="img-box-h">
                                                    <a href="{{ route('product' , ['product' => $header_cart->product()->first()->id]) }}"><img class="img" src="/storage/photo/{{$header_cart->product()->first()->photo}}" alt=""></a>
                                                </div>
                                                <form action="{{ route('deleteCart' , ['cart' => $header_cart->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-delete">حذف</button>
                                                </form>

                                            </div>
                                            <div class="cart-group">
                                                <div class="inf-box-h">
                                                    <h6>{{$header_cart->product()->first()->name}}</h6>
                                                    <p class="inf">تعداد : {{$header_cart->number}}</p>
                                                </div>
                                                <p class="inf"><span class="price">{{$header_cart->product()->first()->price}}</span> <span class="toman"> تومان </span></p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="buy-box-h">
                                        <p class="inf"><span>مجموع : </span> <span class="price">{{number_format($total)}}</span> <span class="toman"> تومان </span></p>
                                        <a href="{{ route('formBuy') }}" class="buy-carts">ثبت سفارش</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="sign">
                            <a href="/login">ورود | ثبت نام</a>
                        </div>
                        @endif

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
                <li class="">
                    <a class="nav-item" href="{{ route('cart') }}">سبد خرید</a>
                </li>
                @if(! checkSeller())
                <li class="">
                    <a class="nav-item" href="{{ route('showRegisterSeller') }}">فروشنده شو</a>
                </li>
                @endif
                @endif

            </ul>
        </div>
        <div class="main">
            <div class="profile-box">
                <div class="user-box">
                    <span id="user-title" class="fa-solid fa-circle-user fa-3x"></span>
                    <h4 class="title">{{$user->name}}</h4>
                </div>
                <ul class="ul-links">
                    <li class="list-link"><i id="icon-profile" class="fa-solid fa-house-user"></i><a href="{{ route('profile') }}" class="links">پنل کاربری</a></li>
                    <li class="list-link"><i id="icon-profile" class="fa-solid fa-cart-shopping"></i><a href="{{ route('cart') }}" class="links">سبد خرید</a></li>
                    <li class="list-link"><i id="icon-profile" class="fa-regular fa-heart"></i><a href="{{ route('favorites') }}" class="links">مورد علاقه</a></li>
                    <li class="list-link"><i id="icon-profile" class="fa-solid fa-cloud-arrow-down"></i><a href="{{ route('delivered') }}" class="links">تحویل شده</a></li>
                    <li class="list-link"><i id="icon-profile" class="fa-solid fa-user-pen"></i><a href="{{ route('editProfile') }}" class="links">اطلاعات حساب کاربری</a></li>
                    <li class="list-link"><i id="icon-profile" class="fa-solid fa-arrow-right-from-bracket"></i><a class="ddown-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> خروج از حساب کاربری</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
            @yield('profile-box')
        </div>
        <footer>
            <div class="head-footer">
                <a href="/">
                    <h3 class="header-title"><span>IRAN</span> <span class="star">STAR</span></h3>
                </a>
                <hr style="width: 100%;">
            </div>
            <div class="body-footer">
                <div class="group">
                    <h6 class="title">با ایران استار</h6>
                    <a href="">فروش در دیجی کالا</a>
                    <a href="">فرصت های شغلی</a>
                    <a href="">درباره دیجی کالا</a>
                    <a href="">گزارش تخلف</a>
                </div>
                <div class="group">
                    <h6 class="title">خدمات مشتریان</h6>
                    <a href="">پاسخ به پرسش های متداول</a>
                    <a href="">شرایط استفاده</a>
                    <a href="">حریم خصوصی</a>
                    <a href="">گزارش باگ</a>
                </div>
                <div class="group">
                    <h6 class="title">راهنمای خرید</h6>
                    <a href="">نحوه ثبت سفارش</a>
                    <a href="">رویه ارسال سفارش</a>
                    <a href="">شهیوه های پرداخت</a>
                </div>
                <div class="group">
                    <h6 class="title">ارتباط با ما</h6>
                    <a href="">ایمیل : mahdi.seri333@gmail.com</a>
                    <a href="">اینستاگرام : @mahdixjfr</a>
                    <a href="">شماره تماس : 09927400445</a>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>