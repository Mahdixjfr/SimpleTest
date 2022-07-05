<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Buy</title>
</head>

<body>
    <h2>{{$product->name}}</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>نام کالا</th>
                <th>شرکت تولید کننده</th>
                <th>موجودی</th>
                <th>قیمت</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$product->name}}</td>
                <td>{{show_name($product->user_id)}}</td>
                <td>{{$product->inventory}}</td>
                <td>{{$product->price}}</td>

            </tr>
            <tr>
                <td></td>
                <td>
                    <form action="/product/buy/{{$product->id}}" method="POST">
                        @method('POST')
                        @csrf
                        <input type="number" class="@error('number') is-invalid @enderror" name="number" value="1">
                        @error('number')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                </td>
            </tr>
            <tr>
                <td></td>
                <td>

                    @csrf
                    <button class="btn btn-success" type="submit">Buy</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>