@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        @foreach($delivereds as $delivered)
        <li>
            <ul>
                @foreach($delivered['products'] as $value)
                <li>{{$value->product()->first()->name}}</li>
                @endforeach
            </ul>
        </li>
        <li>{{$delivered['total']}}</li>
        @endforeach
    </ul>
</div>
@endsection