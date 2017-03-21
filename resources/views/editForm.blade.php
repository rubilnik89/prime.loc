@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item active" href="{{ route('home') }}">Мой профиль</a>
                <a class="list-group-item" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
                <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>
                <a class="list-group-item" href="{{ route('transactions', ['id' => $user->id]) }}">История переводов</a>
            </div>
            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-body">

                        {{ Form::open(array('action' => array('HomeController@edit', $user->id), 'method' => 'post')) }}
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <label for="name">Имя: {{ $user->name }}</label>
                            <input id="name" class="form-control" name="name" placeholder="Введите другое имя">
                        </div>
                        <div class="col-md-4">
                            <label for="surname">Фамилия: {{ $user->surname }}</label>
                            <input id="surname" class="form-control" name="surname" placeholder="Введите другую фамилию">
                        </div>
                        <div class="col-md-4">
                            <label for="phone">Телефон: {{ $user->phone }}</label>
                            <input id="phone" class="form-control" name="phone" placeholder="Введите новый телефон">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">OK</button>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
