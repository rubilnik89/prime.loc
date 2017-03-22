@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item active" href="{{ route('accounts') }}">Счета</a>
            </div>

            <div class="col-md-10">
                <div class="col-md-7">
                    <ul class="nav nav-tabs">
                        <li><a href="{{ route('user', ['id' => $accounts[0]->user_id]) }}">Home</a></li>
                        <li class="active"><a href="{{ route('userAccounts', ['id' => $accounts[0]->user_id]) }}">Accounts</a></li>
                    </ul>
                </div>

                <div class="col-md-7">
                    @foreach($accounts as $account)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Account {{ $account->number }}</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" placeholder="{{ $account->balance }}"
                                               readonly>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-default" href="#" role="button">Пополнить</a>
                                    </div>
                                    <div class="col-md-5">
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
    </div>

@endsection
