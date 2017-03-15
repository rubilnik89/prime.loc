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
                <li><a href="{{ route('user', ['id' => $user->id]) }}">Home</a></li>
                <li><a href="{{ route('userPersonal', ['id' => $user->id]) }}">Personal account</a></li>
                <li class="active"><a href="{{ route('userInvestor', ['id' => $user->id]) }}">Investor account</a></li>
            </ul>

            <div class="col-md-10">
                <div class="col-md-6">
                    <h2>Number</h2>
                </div>
                <div class="col-md-6">
                    <h2>{{ $investorAccount[0] }}</h2>
                </div>
                <div class="col-md-6">
                    <h2>Created at</h2>
                </div>
                <div class="col-md-6">
                    <h2>{{ $investorAccount[1] }}</h2>
                </div>
                <div class="col-md-6">
                    <h2>Updated at</h2>
                </div>
                <div class="col-md-6">
                    <h2>{{ $investorAccount[2] }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
