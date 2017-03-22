@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item" href="{{ route('userAccounts', ['id' => $accounts[0]->user_id]) }}">Мои
                    счета</a>
                <a class="list-group-item active" href="{{ route('moneyTransfer', ['id' => $accounts[0]->user_id]) }}">Перевод
                    денег</a>
                <a class="list-group-item" href="{{ route('transactions', ['id' => $accounts[0]->user_id]) }}">История
                    переводов</a>
            </div>

            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ Form::open(array('action' => array('HomeController@transfer', $accounts[0]->user_id), 'method' => 'post')) }}
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <label for="from">Перевод с</label>
                            <select id="from" class="form-control" name="from">
                                <option value=0 selected>Выберите счет</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->number }}
                                        : {{ $account->balance }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="to">Перевод на</label>
                            <select id="to" class="form-control" name="to">
                                <option value=0 selected>Выберите счет</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->number }}
                                        : {{ $account->balance }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="sum">Сумма</label>
                            <input id="sum" class="form-control" name="sum">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">OK</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-info">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @if(Session::has('noMoney'))
                    <div class="alert alert-info">
                        {{ Session::get('noMoney') }}
                    </div>
                @endif
                @if(Session::has('noSuccess'))
                    <div class="alert alert-info">
                        {{ Session::get('noSuccess') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection