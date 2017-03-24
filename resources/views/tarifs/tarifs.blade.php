@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
                <a class="list-group-item active" href="{{ route('tarifs') }}">Тарифы</a>
            </div>

            <div class="col-md-8">
                @foreach($tarifs as $tarif)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>{{ $tarif->title }}</h4>
                                </div>
                                <div class="col-md-2 col-md-offset-2">
                                    <h4>Дней: {{ $tarif->days }}</h4>
                                </div>
                                <div class="col-md-2 col-md-offset-2">
                                    <h4>Процент: {{ $tarif->percent }}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
