@extends('layouts.app')

@section('title') Cart @endsection
@section('content')
<div class="container">
    <h2>Your Cart</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>نام کالا</th>
                <th>قیمت کالا</th>
                <th>تعداد</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $cart)
            <tr>
                <td>{{$cart['name']}}</td>
                <td>{{$cart['price']}}</td>
                <td>{{$cart['number']}}</td>
                <form action="/cart/{{$cart['id']}}" method="post">
                    @method('delete')
                    @csrf
                    <th><button>حذف</button></th>
                </form>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td>{{$total}} تومان</td>
            </tr>
        </tbody>
    </table>
    <form action="/cart" method="post">
        @method('post')
        @csrf
        <button value="{{$total}}">خرید نهایی</button>
    </form>
</div>
@endsection

</html>