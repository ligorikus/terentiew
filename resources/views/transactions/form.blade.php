@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ !isset($transaction) ? __('transactions.create') : __('transactions.update')}}</h1>
        <form action="{{(!isset($transaction)) ? route('transactions.store', ['wallet' => $wallet]) : route('transactions.update', ['tr-ansaction' => $transaction, 'wallet' => $wallet])}}" method="post">
            {{csrf_field()}}
            @if (isset($transaction))
                @method('PUT')
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">{{__('transactions.value')}}</label>
                <div class="col-sm-10 col-md-4">
                    <input type="number" name="value" class="form-control" @if (isset($transaction)) value="{{$transaction->type}}"@endif>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="type">{{__('transactions.type')}}</label>

                <div class="col-sm-10 col-md-4 custom-control custom-radio">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="type" id="radio-income" aria-label="{{__('transactions.income')}}" value="income">
                        <label class="custom-control-label" for="radio-income">{{__('transactions.income')}}</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="type" id="radio-expense" aria-label="{{__('transactions.expense')}}" value="expense">
                        <label class="custom-control-label" for="radio-expense">{{__('transactions.expense')}}</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ !isset($transaction) ? __('controls.add') : __('controls.update')}}</button>
        </form>
    </div>
@endsection
