@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
                <a class="list-group-item active" href="{{ route('tarifs') }}">Тарифы</a>
            </div>

            @if(Session::has('editTarif'))
                <div class="alert alert-info">
                    {{ Session::get('editTarif') }}
                </div>
            @endif

            @if (!Auth::guest() && Auth::user()->is_admin == 1)
                <div class="col-md-8">
                    <a class="btn btn-default"
                       href="{{ route('addTarif') }}"
                       role="button"><i class="fa fa-plus"></i> Добавить новый тариф</a>
                </div>
            @endif

            <div class="col-md-8">
                <table class="table table-hover table-striped">
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

@endsection
