@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
                <a class="list-group-item active" href="{{ route('tarifs') }}">Тарифы</a>
            </div>

            <div class="col-md-4">
                {{ Form::open(array('action' => array('TarifController@addTarif'), 'method' => 'get')) }}
                    <input name="addTarif" type="hidden" value="1">
                    <label for="title">Название</label>
                    <input id="title" class="form-control" name="title" placeholder="Введите название нового тарифа">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="days">Дни</label>
                            <input id="days" class="form-control" name="days" placeholder="Введите количество дней">
                        </div>
                        <div class="col-xs-6">
                            <label for="days">Процент</label>
                            <input id="percent" class="form-control" name="percent" placeholder="Введите процент">
                        </div>
                    </div>
                    <label for="enabled">Сделать тариф активным?</label>
                    <select id="enabled" class="form-control" name="enabled">
                        <option value=1>Активный</option>
                        <option value=0>Не активный</option>
                    </select>
                    <button class="btn btn-primary" type="submit">OK</button>
                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection
