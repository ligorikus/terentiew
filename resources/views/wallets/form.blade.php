@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ !isset($wallet) ? __('wallets.create') : __('wallets.update')}}</h1>
        <form action="{{(!isset($wallet)) ? route('wallets.store') : route('wallets.update', ['wallet' => $wallet])}}" method="post">
            {{csrf_field()}}
            @if (isset($wallet))
                @method('PUT')
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">{{__('wallets.type')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="text" name="type" class="form-control" @if (isset($wallet)) value="{{$wallet->type}}"@endif>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ !isset($wallet) ? __('controls.add') : __('controls.update')}}</button>
        </form>
    </div>
@endsection
