@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <div class="row">
                    <div class="col-md-offset-1">
                        <a class="list-group-item" href="{{ route('userPersonal', ['id' => $user->id]) }}">Лицевой</a>
                        <a class="list-group-item active" href="{{ route('userInvestor', ['id' => $user->id]) }}">Инвесторские</a>
                    </div>
                </div>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>
                <a class="list-group-item" href="{{ route('transactions', ['id' => $user->id]) }}">История переводов</a>
                <a class="list-group-item" href="{{ route('tarifs') }}">Тарифы</a>
            </div>
            @if(Session::has('SelectTarif'))
                <div class="col-md-6">
                    {{ Form::open(array('action' => array('HomeController@addAccount', $user->id), 'method' => 'get')) }}
                    <p>Выберите тарифный план:</p>
                    <input name="addtarif" type="hidden" value="1">
                    @foreach($tarifs as $tarif)
                        <div class="panel panel-default" onclick="document.getElementById('{{ $tarif->tarifs_id }}').checked = true;">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input id="{{ $tarif->tarifs_id }}" type="radio" name="tarif" value="{{ $tarif->tarifs_id }}">
                                    </div>
                                    <div class="col-md-4">
                                        <h4>{{ $tarif->title }}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>{{ $tarif->days }}</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>{{ $tarif->percent }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit">OK</button>
                    {{ Form::close() }}
                </div>
            @endif
            @if(Session::has('Transfer'))
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Перевод средств</div>
                        <div class="panel-body">
                            {{ Form::open(array('action' => array('HomeController@addAccount', $user->id), 'method' => 'get')) }}
                            <input name="transfer" type="hidden" value="1">
                            <input name="tarifs_id" type="hidden" value="{{ $tarifs_id }}">
                            <div class="col-md-4">
                                <label for="from">Перевод с</label>
                                <input id="from" class="form-control" name="from" readonly placeholder="{{ $personal['number'] }} : {{ $personal['balance'] }} $">
                            </div>
                            <div class="col-md-4">
                                <label for="sum">Сумма</label>
                                <input id="sum" class="form-control" name="sum" placeholder="Не более {{ $personal['balance'] }} $">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">OK</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
