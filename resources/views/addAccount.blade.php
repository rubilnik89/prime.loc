@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item active" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>
                <a class="list-group-item" href="{{ route('transactions', ['id' => $user->id]) }}">История переводов</a>
                <a class="list-group-item" href="{{ route('tarifs') }}">Тарифы</a>
            </div>

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

        </div>
    </div>

@endsection
