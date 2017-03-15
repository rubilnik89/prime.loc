@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <ul class="nav nav-tabs">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('personalAccount', ['id' => $user->id]) }}">Personal account</a></li>
            <li class="active"><a href="{{ route('investorAccount', ['id' => $user->id]) }}">Investor account</a></li>
        </ul>

        <div class="col-md-12">
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

@endsection
