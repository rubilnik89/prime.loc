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
                    <li><a href="{{ route('user', ['id' => $user->id]) }}">Home</a></li>
                    <li class="active"><a href="{{ route('userPersonal', ['id' => $user->id]) }}">Personal account</a>
                    </li>
                    <li><a href="{{ route('userInvestor', ['id' => $user->id]) }}">Investor account</a></li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Number</h3>
                            </div>
                            <div class="col-md-6">
                                <h3>{{ $personalAccount->number }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
