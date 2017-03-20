@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Домой</a>
                <a class="list-group-item active" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>
            </div>

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            @foreach($user->accounts as $account)
                                <div class="col-md-3">
                                    <h3>Account</h3>
                                </div>
                                <div class="col-md-3">
                                    <h3>{{ $account->number }}</h3>
                                </div>
                                <div class="col-md-3">
                                    <h3>Balance</h3>
                                </div>
                                <div class="col-md-3">
                                    <h3>{{ $account->balance }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
