<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Cart</title>
</head>

<body>
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
                <td>{{$total}} مجموع</td>
            </tr>
        </tbody>
    </table>
    <form action="/cart" method="post">
        @method('post')
        @csrf
        <button>خرید نهایی</button>
    </form>
</body>

</html>