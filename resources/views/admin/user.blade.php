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

            <table class="table">
                <tr>
                    <td><h2>Name</h2></td>
                    <td><h2>{{ $user->name }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Surame</h2></td>
                    <td><h2>{{ $user->surname }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Email</h2></td>
                    <td><h2>{{ $user->email }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Phone</h2></td>
                    <td><h2>{{ $user->phone }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Country</h2></td>
                    <td><h2>{{ $user->country }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Счета</h2></td>
                    @foreach( $user->accounts as $account)
                        <td><h2>{{ $account->number }}</h2></td>
                        <tr><td></td>
                    @endforeach
                        </tr>
                </tr>
                <tr>
                    <td><h2>Created at</h2></td>
                    <td><h2>{{ $user->created_at }}</h2></td>
                </tr>
                <tr>
                    <td><h2>Updated at</h2></td>
                    <td><h2>{{ $user->updated_at }}</h2></td>
                </tr>
            </table>

        </div>
    </div>
</div>

@endsection
