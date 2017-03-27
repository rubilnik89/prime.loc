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
                {{ Form::open(array('action' => array('TarifController@editTarif', $tarif->tarifs_id), 'method' => 'get')) }}
                    <input name="editTarif" type="hidden" value="1">
                    <label for="title">Название</label>
                    <input id="title" class="form-control" name="title" placeholder="{{ $tarif->title }}">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="days">Дни</label>
                            <input id="days" class="form-control" name="days" placeholder="{{ $tarif->days }}">
                        </div>
                        <div class="col-xs-6">
                            <label for="days">Процент</label>
                            <input id="percent" class="form-control" name="percent" placeholder="{{ $tarif->percent }}">
                        </div>
                    </div>
                <label for="enabled">Тариф активен?</label>
                    <select id="enabled" class="form-control" name="enabled">
                        <option value={{ $tarif->enabled }}>{{ TARIF_IS_ENABLED[$tarif->enabled] }}</option>
                        @if ($tarif->enabled == 1)
                            <option value=0>Не активен</option>
                        @else
                            <option value=1>Активен</option>
                        @endif
                    </select>
                    <button class="btn btn-primary" type="submit">OK</button>
                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection
