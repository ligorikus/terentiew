@extends('layouts.app')

@section('content')
    <div class="container">
        <trade-form :products="{{json_encode($products)}}" :wallets="{{json_encode($wallets)}}" sell_route="{{route('trade.sell')}}"></trade-form>
    </div>
@endsection
