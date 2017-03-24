@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item active" href="{{ route('accounts') }}">Счета</a>
            </div>

            <div class="col-md-6">
                <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Назад</a>
                @foreach($transactions as $transaction)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>From: {{ $transaction->account_id_from }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>To: {{ $transaction->account_id_to }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Amount: {{ $transaction->amount }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{ TRANSACTION_TYPES[$transaction->type] }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{ TRANSACTION_STATUSES[$transaction->status] }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{ $transaction->created_at }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
