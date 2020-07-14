@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ !isset($user) ? __('users.create') : __('users.update')}}</h1>
        <form action="{{(!isset($user)) ? route('users.store') : route('users.update', ['user' => $user])}}" method="post">
            {{csrf_field()}}
            @if (isset($user))
                @method('PUT')
            @endif
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
                    <input type="text" name="name" class="form-control" @if (isset($user)) value="{{$user->name}}"@endif>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="short_name">{{__('users.email')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="text" name="email" class="form-control" @if (isset($user)) value="{{$user->short_name}}"@endif>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="short_name">{{__('users.password')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="password" name="password" class="form-control" @if (isset($user)) value="{{$user->password}}"@endif>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="short_name">{{__('users.password_confirmation')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="password" name="password_confirmation" class="form-control" @if (isset($user)) value="{{$user->password_confirmation}}"@endif>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ !isset($user) ? __('controls.add') : __('controls.update')}}</button>
        </form>
    </div>
@endsection
