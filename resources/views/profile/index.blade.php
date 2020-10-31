@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{__('users.profile')}}</h1>
        <form action="{{route('profile.update')}}" method="post">
            {{csrf_field()}}
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">{{__('users.name')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="email">{{__('users.email')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="text" name="email" class="form-control" value="{{$user->email}}" disabled="disabled">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="password">{{__('users.password')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="password_confirmation">{{__('users.password_confirmation')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('controls.update')}}</button>
        </form>
    </div>
@endsection
