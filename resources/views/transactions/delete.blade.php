@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('transactions.destroy', compact('transaction'))}}" method="post">
            {{csrf_field()}}
            @method('delete')
            <h1>{{$transaction->name}}</h1>
            <hr>
            <h5>{{__('transactions.are_u_sure_to_delete')}}</h5>
            <button class="btn btn-danger">{{__('controls.delete')}}</button>
            <a href="{{route('transactions.index')}}" class="btn btn-light">{{__('controls.back_to_list')}}</a>
        </form>
    </div>
@endsection
