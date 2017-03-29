@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item active" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
                <a class="list-group-item" href="{{ route('tarifs') }}">Тарифы</a>
                <a class="list-group-item" href="{{ route('logs') }}">Логи</a>
            </div>

            <div class="col-md-10">
                <div class="col-md-7">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="{{ route('user', ['id' => $user->id]) }}">Home</a></li>
                        <li><a href="{{ route('userAccountsAdmin', ['id' => $user->id]) }}">Accounts</a></li>
                    </ul>
                </div>

                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Email</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>{{ $user->email }}</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>Name</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>{{ $user->name }}</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>Surame</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>{{ $user->surname }}</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>Phone</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>{{ $user->phone }}</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>Country</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>{{ $user->Country->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
