@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Домой</a>
                <a class="list-group-item active" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
            </div>

            <div class="col-md-10">

                <ul class="nav nav-tabs">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active"><a href="{{ route('userAccounts', ['id' => $user->id]) }}">Accounts</a></li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            @foreach($accounts as $account)
                                <div class="col-md-3">
                                    <h3>Investor number</h3>
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
