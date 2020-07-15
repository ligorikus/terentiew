@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__('wallets.value')}}: {{$wallet->value}} ₸</h2>
        <table class="table">
            <thead>
            <tr>
                <td>#</td>
                <td>{{__('transactions.value')}}</td>
                <td>{{__('transactions.type')}}</td>
                <td>{{__('transactions.creator')}}</td>
                <td>{{__('controls.time')}}</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($wallet->transactions->sortByDesc('created_at') as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
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
                    <td>{{$transaction->creator ? $transaction->creator->name : ''}}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>
                        <a href="{{route('transactions.show', compact('transaction'))}}" class="btn btn-primary">
                            {{__('controls.show')}}
                        </a>
                        {{--<a href="{{route('wallets.show', compact('wallet'))}}" class="btn btn-primary">{{__('controls.show')}}</a>
                        <a href="{{route('wallets.edit', compact('wallet'))}}" class="btn btn-warning">{{__('controls.update')}}</a>
                        <a href="{{route('wallets.delete', compact('wallet'))}}" class="btn btn-danger">{{__('controls.delete')}}</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('transactions.create', compact('wallet'))}}" class="btn btn-primary">{{__('transactions.create')}}</a>
    </div>
@endsection
