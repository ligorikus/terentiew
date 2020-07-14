@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('do_enable_auth')}}" method="post">
            {{csrf_field()}}
            <h1>Включить авторизацию?</h1>
            <hr>
            <button class="btn btn-danger">Включить</button>
        </form>
    </div>
@endsection
