@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item active" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
            </div>
            <div class="col-md-10">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="{{ route('user', ['id' => $user->id]) }}">Home</a></li>
                    <li><a href="{{ route('userPersonal', ['id' => $user->id]) }}">Personal Account</a></li>
                    <li><a href="{{ route('userInvestor', ['id' => $user->id]) }}">Investor Account</a></li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
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
                                <h3>Email</h3>
                            </div>
                            <div class="col-md-6">
                                <h3>{{ $user->email }}</h3>
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
                                <h3>{{ $user->country }}</h3>
                            </div>
                            <div class="col-md-6">
                                <h3>Accounts</h3>
                            </div>
                            <div class="col-md-6">
                                @foreach( $user->accounts as $account)
                                    <h3>{{ $account->number }}</h3>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
