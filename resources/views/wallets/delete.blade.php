@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('wallets.destroy', compact('wallet'))}}" method="post">
            {{csrf_field()}}
            @method('delete')
            <h1>{{$wallet->name}}</h1>
            <hr>
            <h5>{{__('wallets.are_u_sure_to_delete')}}</h5>
            <button class="btn btn-danger">{{__('controls.delete')}}</button>
            <a href="{{route('wallets.index')}}" class="btn btn-light">{{__('controls.back_to_list')}}</a>
        </form>
    </div>
@endsection
