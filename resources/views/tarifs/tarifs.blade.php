@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @if (!Auth::guest() && Auth::user()->is_admin == 1)
                    <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                    <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
                    <a class="list-group-item active" href="{{ route('tarifs') }}">Тарифы</a>
                    <a class="list-group-item" href="{{ route('logs') }}">Логи</a>
                @else
                    <a class="list-group-item" href="{{ route('home') }}">Мой профиль</a>
                    <a class="list-group-item" href="{{ route('userAccounts', ['id' => $user->id]) }}">Мои счета</a>
{{--                    <a class="list-group-item" href="{{ route('moneyTransfer', ['id' => $user->id]) }}">Перевод денег</a>--}}
                    <a class="list-group-item" href="{{ route('transactions', ['id' => $user->id]) }}">История переводов</a>
                    <a class="list-group-item active" href="{{ route('tarifs') }}">Тарифы</a>
                @endif
            </div>

            @if(Session::has('editTarif'))
                <div class="alert alert-info">
                    {{ Session::get('editTarif') }}
                </div>
            @endif

            <div class="col-md-8">
                <div class="panel panel-default">
                    @if (!Auth::guest() && Auth::user()->is_admin == 1)
                        <div class="panel-heading">Тарифные планы
                            <a class="btn btn-default" href="{{ route('addTarif') }}" role="button"><i
                                        class="fa fa-plus"></i> Добавить новый тариф</a>
                        </div>
                    @else
                        <div class="panel-heading">Тарифные планы</div>
                    @endif
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                @foreach(array_keys($columns) as $column)
                                    <th class="col-md-2">
                                        <i class="fa fa-fw fa-sort{{ ($sortby == $columns[$column]) ? getSort($order) : '' }}"></i>
                                        {{link_to_action(
                                        'TarifController@all',
                                        $column, array_merge($request->all(), ['sortby' => $columns[$column], 'order' => getNextOrder($order, $request->sortby, $columns[$column])]))}}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tarifs as $tarif)
                                <tr>
                                    <td class="col-md-2">
                                        <h4>{{ $tarif->title }}</h4>
                                    </td>
                                    <td class="col-md-2 col-md-offset-2">
                                        <h4>Дней: {{ $tarif->days }}</h4>
                                    </td>
                                    <td class="col-md-2 col-md-offset-2">
                                        <h4>Процент: {{ $tarif->percent }}%</h4>
                                    </td>
                                    <td class="col-md-1">
                                        <h4>{{ TARIF_IS_ENABLED[$tarif->enabled] }}</h4>
                                    </td>
                                    @if (!Auth::guest() && Auth::user()->is_admin == 1)
                                        <td class="col-md-1">
                                            <a class="btn btn-default"
                                               href="{{ route('editTarif', ['id' => $tarif->tarifs_id]) }}"
                                               role="button">Редактировать</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
