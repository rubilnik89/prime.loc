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

                <table class="table">
                    <thead>
                        <tr>
                            <th>Investor number</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts as $index => $account)
                        <tr>
                            <td>{{ $account->number }}</td>
                            <td>{{ $account->balance }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
