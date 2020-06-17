@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>{{__('products.name')}}</td>
                    <td>{{__('units.title')}}</td>
                    <td>{{__('products.price')}}</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->unit->name}}</td>
                    <td>{{$product->price->price}}</td>
                    <td>
                        <a href="{{route('products.edit', compact('product'))}}" class="btn btn-warning">{{__('controls.update')}}</a>
                        <a href="{{route('products.delete', compact('product'))}}" class="btn btn-danger">{{__('controls.delete')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('products.create')}}" class="btn btn-primary">{{__('products.create')}}</a>
    </div>

@endsection
