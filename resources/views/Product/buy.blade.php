@extends('layouts.index')

@section('css_links')
<link rel="stylesheet" href="/css/buy.css">
@endsection

@section('main')
<div class="main">
    <div class="address">
        <h5 class="title title-address">ادرس تحویل سفارش</h5>
        <p class="inf address-user">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, sit tempore aliquam nam vero vel!</p>
        <a class="end-w change" href="{{ route('editProfile') }}">تغییر ادرس</a>
    </div>
    <div class="buy-box">
        <div class="buy-group">
            <h6 class="title">هزینه کالا ها</h6>
            <p>{{number_format($total)}} <span class="toman">تومان </span> </p>
        </div>
        <hr style="width: 85%;">
        <div class="buy-group">
            <h6 class="price-dt">مجموع</h6>
            <p><span class="price">{{number_format($total + 25000)}}</span> <span class="toman">تومان</span></p>
        </div>
        <hr style="width: 85%;">
        <a id="send-time" href="#send_title" class="send-time center-t">زمان ارسال را تعیین کنید</a href="#send_title">
        <form id="form-buy" action="/cart" method="POST">
            @method('post')
            @csrf
            <button id="btn-buy" type="submit" name="time" class="btn-buy center-t">خرید</button>
        </form>
    </div>
    <div class="description">
        <h5 class="title">محصولات شما</h5>
        <div class="products">
            @foreach($carts as $cart)
            <div class="product">
                <img class="img" src="/storage/photo/{{$cart->product()->first()->photo}}" alt="">
            </div>
            @endforeach
        </div>
        <h5 id="send_title" class="title">زمان ارسال را تعیین کنید</h5>
        <div class="date">
            @foreach($date as $key => $value)
            <div class="day">
                <h6 class="title">{{$value['week']}}</h6>
                <label for="{{$value['week']}}">{{$value['day']}}</label>
                <input onclick="sendDate()" type="radio" name="day" id="{{$value['week']}}" value="{{$key}}">
            </div>
            @endforeach
        </div>
        <hr style="width: 100%;">
        <div class="price-box">
            <p>هزینه ارسال : <span class="price">{{number_format(25000)}} </span> <span class="toman"> تومان</span></p>
        </div>
    </div>

</div>

<script>
    function sendDate() {
        document.getElementById('send-time').style.display = "none";
        document.getElementById('form-buy').style.display = "block";
        document.getElementById('btn-buy').value = event.target.value;
    }
</script>
@endsection