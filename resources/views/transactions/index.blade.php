@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>{{__('wallets.wallet')}}</td>
                    <td>{{__('transactions.value')}}</td>
                    <td>{{__('transactions.type')}}</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->wallet->type}}</td>
                    <td>{{$transaction->value}}</td>
                    <td>
                        <h5>
                            @if ($transaction->type === 'income')
                                <span class="badge badge-success">{{__('transactions.income')}}</span>
                            @else
                                <span class="badge badge-danger">{{__('transactions.expense')}}</span>
                            @endif
                        </h5>
                    </td>
                    <td>
                        {{--<a href="{{route('transactions.edit', compact('transaction'))}}" class="btn btn-warning">{{__('controls.update')}}</a>
                        <a href="{{route('transactions.delete', compact('transaction'))}}" class="btn btn-danger">{{__('controls.delete')}}</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
