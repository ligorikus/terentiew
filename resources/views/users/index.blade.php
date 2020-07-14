@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>{{__('users.name')}}</td>
                    <td>{{__('users.email')}}</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        {{--<a href="{{route('users.edit', compact('user'))}}" class="btn btn-warning">{{__('controls.update')}}</a>--}}
                        {{--<a href="{{route('users.delete', compact('user'))}}" class="btn btn-danger">{{__('controls.delete')}}</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('users.create')}}" class="btn btn-primary">{{__('users.create')}}</a>
    </div>

@endsection
