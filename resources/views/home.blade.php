@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <a href="{{ route('home') }}">Домой</a>
                <br>
                <a href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
            </div>
            <div class="col-md-11">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">tab2</a></li>
                    <li><a href="#">tab3</a></li>
                </ul>
                <div class="col-md-12">
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
@endsection
