@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>{{__('wallets.type')}}</td>
                    <td>{{__('wallets.value')}}</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($wallets as $wallet)
                <tr>
                    <td>{{$wallet->id}}</td>
                    <td>{{$wallet->type}}</td>
                    <td>{{$wallet->value}}</td>
                    <td>
                        <a href="{{route('wallets.edit', compact('wallet'))}}" class="btn btn-warning">{{__('controls.update')}}</a>
                        <a href="{{route('wallets.delete', compact('wallet'))}}" class="btn btn-danger">{{__('controls.delete')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('wallets.create')}}" class="btn btn-primary">{{__('wallets.create')}}</a>
    </div>

@endsection
