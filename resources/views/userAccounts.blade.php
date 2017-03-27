@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item active" href="{{ route('userAccounts', ['id' => $accounts[0]->user_id]) }}">Мои счета</a>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $accounts[0]->user_id]) }}">Перевод денег</a>
                <a class="list-group-item" href="{{ route('transactions', ['id' => $accounts[0]->user_id]) }}">История переводов</a>
                <a class="list-group-item" href="{{ route('tarifs') }}">Тарифы</a>
            </div>

            <div class="col-md-10">
                <a class="btn btn-default"
                   href="{{ route('addAccount', ['id' => $accounts[0]->user_id]) }}"
                   role="button"><i class="fa fa-plus"></i> Добавить новый счет</a>
            </div>

            <div class="col-md-6">
                @if(Session::has('addedAccount'))
                    <div class="alert alert-info">
                        {{ Session::get('addedAccount') }}
                    </div>
                @endif
                @foreach($accounts as $account)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Account {{ $account->number }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{ TARIFS[$account->tarif_id] }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" placeholder="{{ $account->balance }}"
                                           readonly>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-default" href="#" role="button">Пополнить</a>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-default pull-right"
                                       href="{{ route('accountTransactions',['id' => $account->user_id, 'number' => $account->number]) }}"
                                       role="button">История</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
