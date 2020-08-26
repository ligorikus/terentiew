@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('units.create')}}" class="btn btn-primary">{{__('units.create')}}</a>
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>{{__('units.name')}}</td>
                    <td>{{__('units.short_name')}}</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($units as $unit)
                <tr>
                    <td>{{$unit->id}}</td>
                    <td>{{$unit->name}}</td>
                    <td>{{$unit->short_name}}</td>
                    <td>
                        <a href="{{route('units.edit', compact('unit'))}}" class="btn btn-warning">{{__('controls.update')}}</a>
                        <a href="{{route('units.delete', compact('unit'))}}" class="btn btn-danger">{{__('controls.delete')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
