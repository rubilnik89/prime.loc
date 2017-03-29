@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="list-group-item active" href="{{ route('users') }}">Пользователи</a>
                <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
                <a class="list-group-item" href="{{ route('tarifs') }}">Тарифы</a>
                <a class="list-group-item" href="{{ route('logs') }}">Логи</a>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Users</div>
                            <div class="panel-body">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            @foreach(array_keys($columns) as $column)
                                                <th class="col-md-2">
                                                    <i class="fa fa-fw fa-sort{{ ($sortby == $columns[$column]) ? getSort($order) : '' }}"></i>
                                                    {{link_to_action(
                                                    'AdminController@main',
                                                    $column, array_merge($request->all(), ['sortby' => $columns[$column], 'order' => getNextOrder($order, $request->sortby, $columns[$column])]))}}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $index => $user)
                                        <tr class="clickable" onclick="window.location.href='{{ route('user', ['id' => $user->id]) }}';">
                                            <td>{{ $index + 1 }}</td>
                                            <td class="col-md-2">{{ $user->name }}</td>
                                            <td class="col-md-3">{{ $user->surname }}</td>
                                            <td class="col-md-3">{{ $user->email }}</td>
                                            <td class="col-md-2">{{ $user->phone }}</td>
                                            <td class="col-md-2">{{ $user->Country->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ Form::open(array('action' => array('AdminController@main'), 'method' => 'get')) }}
                        <input name="search" type="hidden" value="1">
                        <label for="name">Search by name</label>
                        <input id="name" class="form-control" name="name" value="{{ Request::get('name') }}">
                        <label for="surname">Search by surname</label>
                        <input id="surname" class="form-control" name="surname" value="{{ Request::get('surname') }}">
                        <label for="email">Search by email</label>
                        <input id="email" class="form-control" name="email" value="{{ Request::get('email') }}">
                        <label for="phone">Search by phone</label>
                        <input id="phone" class="form-control" name="phone" value="{{ Request::get('phone') }}">
                        <label for="country">Search by country</label>
                        <select id="country" class="form-control" name="country">
                            <option value="0" selected>Выберите страну для поиска</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->country_id }}" {{ $country->country_id == Request::get('country') ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">OK</button>
                        <a class="btn btn-primary" href="{{ route('users') }}" role="button">Сбросить</a>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
                {{ $users->appends(Request::input())->links() }}
            </div>
        </div>
    </div>
@endsection
