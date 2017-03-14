@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#">Menu 1</a></li>
            <li><a href="#">Menu 2</a></li>
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
@endsection
