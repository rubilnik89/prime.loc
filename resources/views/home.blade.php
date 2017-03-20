@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item active" href="{{ route('home') }}">Домой</a>
                <a class="list-group-item" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
            </div>
            <div class="col-md-10">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('userAccounts', ['id' => $user->id]) }}">Accounts</a></li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
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
                                <h2>Email</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $user->email }}</h2>
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
                                <h2>{{ $user->country }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
