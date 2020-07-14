@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('users.destroy', compact('user'))}}" method="post">
            {{csrf_field()}}
            @method('delete')
            <h1>{{$user->name}}</h1>
            <hr>
            <h5>{{__('users.are_u_sure_to_delete')}}</h5>
            <button class="btn btn-danger">{{__('controls.delete')}}</button>
            <a href="{{route('users.index')}}" class="btn btn-light">{{__('controls.back_to_list')}}</a>
        </form>
    </div>
@endsection
