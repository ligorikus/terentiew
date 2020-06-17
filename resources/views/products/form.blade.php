@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ !isset($product) ? __('products.create') : __('products.update')}}</h1>
        <form action="{{(!isset($product)) ? route('products.store') : route('products.update', ['product' => $product])}}" method="post">
            {{csrf_field()}}
            @if (isset($product))
                @method('PUT')
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">{{__('products.name')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="text" name="name" class="form-control" @if (isset($product)) value="{{$product->name}}"@endif>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="unit">{{__('units.unit')}}</label>
                <div class="col-sm-10 col-md-4">
                    <select name="unit" class="form-control">
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}" {{isset($product) ? $product->unit_id === $unit->id ? 'selected' : '' : ''}}>
                                {{$unit->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">{{__('products.price')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="number" name="price" class="form-control"  @if (isset($product)) value="{{$product->price->price}}"@endif>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ !isset($product) ? __('controls.add') : __('controls.update')}}</button>
        </form>
    </div>
@endsection
