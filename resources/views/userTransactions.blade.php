@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>
                <a class="list-group-item active" href="{{ route('transactions', ['id' => $user->id]) }}">История переводов</a>
            </div>

            <div class="col-md-6">
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
                                    <h4>Type: {{ $transaction->type }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{ $transaction->status }}</h4>
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
