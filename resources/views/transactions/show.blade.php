@extends('layouts.app')

@section('content')
    <div class="container">
        <h2><a href="{{route('wallets.show', ['wallet' => $transaction->wallet])}}">{{$transaction->wallet->type}}</a></h2>
        <h5>{{__('transactions.creator')}}: {{$transaction->creator ? $transaction->creator->name : ''}}</h5>
        <table class="table">
            <thead>
            <tr>
                <td>#</td>
                <td>{{__('products.product')}}</td>
                <td>{{__('trade.count')}}</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($transaction->products->sortBy('id') as $express)
                <tr>
                    <td>{{$express->id}}</td>
                    <td>{{$express->name}}</td>
                    <td>{{$express->pivot->value}}</td>
                    <td>
                        <h5>
                        @if ($express->pivot->type === 'income')
                            <span class="badge badge-success">{{__('transactions.income')}}</span>
                        @else
                            <span class="badge badge-danger">{{__('transactions.expense')}}</span>
                        @endif
                        </h5>
                    </td>
                    <td>
                        {{--<a href="{{route('wallets.show', compact('wallet'))}}" class="btn btn-primary">{{__('controls.show')}}</a>
                        <a href="{{route('wallets.edit', compact('wallet'))}}" class="btn btn-warning">{{__('controls.update')}}</a>
                        <a href="{{route('wallets.delete', compact('wallet'))}}" class="btn btn-danger">{{__('controls.delete')}}</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
