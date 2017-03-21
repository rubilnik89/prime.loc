@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item active" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>
                <a class="list-group-item" href="{{ route('transactions', ['id' => $user->id]) }}">История переводов</a>
            </div>

            <div class="col-md-6">
                @foreach($user->accounts as $account)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Account   {{ $account->number }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" placeholder="{{ $account->balance }}" readonly>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-default" href="#" role="button">Пополнить</a>
                                </div>
                                <div class="col-md-5">
                                    <a class="btn btn-default pull-right" href="{{ route('accountTransactions',['id' => $user->id, 'number' => $account->number]) }}" role="button">История</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
