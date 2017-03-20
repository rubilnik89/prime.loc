@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Домой</a>
                <a class="list-group-item" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <a class="list-group-item active" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод
                    денег</a>
            </div>

            <div class="col-md-10">

                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ Form::open(array('action' => array('HomeController@transfer', $user->id), 'method' => 'post')) }}
                        {{ csrf_field() }}
                        <div class="col-md-2">
                            <label for="from">Перевод с</label>
                            <select id="from" class="form-control" name="from">
                                <option value="null" selected></option>
                                @foreach($user->accounts as $account)
                                    <option value="{{ $account->number }}">{{ $account->number }}
                                        : {{ $account->balance }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="to">Перевод на</label>
                            <select id="to" class="form-control" name="to">
                                <option value="null" selected></option>
                                @foreach($user->accounts as $account)
                                    <option value="{{ $account->number }}">{{ $account->number }}
                                        : {{ $account->balance }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
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
            </div>
        </div>
    </div>

@endsection