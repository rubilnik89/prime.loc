@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('personalAccount', ['id' => $user->id]) }}">Personal account</a></li>
            <li><a href="{{ route('investorAccount', ['id' => $user->id]) }}">Investor account</a></li>
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
            <div class="col-md-6">
                <h2>Лицевой счет</h2>
            </div>
            <div class="col-md-6">
                <h2>{{ $user->accounts[0]->number }}</h2>
            </div>
            <div class="col-md-6">
                <h2>Инвесторский счет</h2>
            </div>
            <div class="col-md-6">
                <h2>{{ $investor }}</h2>
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
@endsection
