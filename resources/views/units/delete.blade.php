@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('units.destroy', compact('unit'))}}" method="post">
            {{csrf_field()}}
            @method('delete')
            <h1>{{$unit->name}}</h1>
            <hr>
            <h5>{{__('units.are_u_sure_to_delete')}}</h5>
            <button class="btn btn-danger">{{__('controls.delete')}}</button>
            <a href="{{route('units.index')}}" class="btn btn-light">{{__('controls.back_to_list')}}</a>
        </form>
    </div>
@endsection
