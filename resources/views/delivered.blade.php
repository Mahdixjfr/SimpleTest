@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        @foreach($delivereds as $delivered)
        <li>{{}}</li>
        @endforeach
    </ul>
</div>
@endsection