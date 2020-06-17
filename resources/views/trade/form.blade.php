@extends('layouts.app')

@section('content')
    <div class="container">
        <trade-form :products="{{$products}}" :wallets="{{$wallets}}"></trade-form>
    </div>
@endsection
