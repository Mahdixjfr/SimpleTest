@extends('layouts.app')

@section('title') Buy @endsection
@section('content')
<div class="container">
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
                <td>{{showName($product->seller_id)}}</td>
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
</div>
@endsection

</html>