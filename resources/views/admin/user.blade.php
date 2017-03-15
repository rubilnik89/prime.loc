@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('users') }}">Пользователи</a>
            <br>
            <a href="{{ route('accounts') }}">Счета</a>
        </div>
        <div class="col-md-10">
            <ul class="nav nav-tabs">
                <li class="active"><a href="{{ route('user', ['id' => $user->id]) }}">Home</a></li>
                <li><a href="{{ route('userPersonal', ['id' => $user->id]) }}">Personal Account</a></li>
                <li><a href="{{ route('userInvestor', ['id' => $user->id]) }}">Investor Account</a></li>
            </ul>

            <div class="col-md-10">
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
                <div class="col-md-6">
                    <h2>Лицевой счет</h2>
                </div>
                <div class="col-md-6">
                    <h2>{{ $personalAccount->number }}</h2>
                </div>
                <div class="col-md-6">
                    <h2>Created at</h2>
                </div>
                <div class="col-md-6">
                    <h2>{{ $user->created_at }}</h2>
                </div>
                <div class="col-md-6">
                    <h2>Updated at</h2>
                </div>
                <div class="col-md-6">
                    <h2>{{ $user->updated_at }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
