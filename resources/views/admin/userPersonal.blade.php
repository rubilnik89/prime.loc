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
                <li class="active"><a href="{{ route('userPersonal', ['id' => $user->id]) }}">Personal account</a></li>
                <li><a href="{{ route('userInvestor', ['id' => $user->id]) }}">Investor account</a></li>
            </ul>

            <table class="table">
                <tr>
                    <td><h2>Number</h2></td>
                    <td><h2>{{ $personalAccount->number }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Created at</h2></td>
                    <td><h2>{{ $personalAccount->created_at }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Updated at</h2></td>
                    <td><h2>{{ $personalAccount->updated_at }}</h2></td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
