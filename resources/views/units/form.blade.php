@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ !isset($unit) ? __('units.create') : __('units.update')}}</h1>
        <form action="{{(!isset($unit)) ? route('units.store') : route('units.update', ['unit' => $unit])}}" method="post">
            {{csrf_field()}}
            @if (isset($unit))
                @method('PUT')
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">{{__('units.name')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="text" name="name" class="form-control" @if (isset($unit)) value="{{$unit->name}}"@endif>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="short_name">{{__('units.short_name')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="text" name="short_name" class="form-control" @if (isset($unit)) value="{{$unit->short_name}}"@endif>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ !isset($unit) ? __('controls.add') : __('controls.update')}}</button>
        </form>
    </div>
@endsection
