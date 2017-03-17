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

            <table class="table">
                <thead>
                <tr>
                    <th>Investor number</th>
                    <th>Balance</th>
                </tr>
                </thead>
                <tbody>
                @foreach($investorAccounts as $index => $investorAccount)
                    <tr>
                        <td>{{ $investorAccount->number }}</td>
                        <td>{{ $investorAccount->balance }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
