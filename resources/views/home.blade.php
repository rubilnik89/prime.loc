@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item active" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>
                <a class="list-group-item" href="{{ route('transactions', ['id' => $user->id]) }}">История переводов</a>
            </div>
            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Email</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $user->email }}</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>Name</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>Surame</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $user->surname }}</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>Phone</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $user->phone }}</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>Country</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $user->Country->name }}</h2>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary"
                                   href="{{ route('edit', ['id' => $user->id]) }}"
                                   role="button">Редактировать профиль</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
