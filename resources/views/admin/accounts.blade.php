@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                    <a class="list-group-item active" href="{{ route('accounts') }}">Счета</a>
                    <a class="list-group-item" href="{{ route('tarifs') }}">Тарифы</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Accounts</div>
                            <div class="panel-body">

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            @foreach(array_keys($columns) as $column)
                                                <th class="col-md-2">
                                                    <i class="fa fa-sort{{ ($sortby == $columns[$column]) ? getSort($order) : '' }}"></i>
                                                    {{link_to_action(
                                                        'AdminController@accounts',
                                                         $column, array_merge($request->all(), ['sortby' => $columns[$column], 'order' => getNextOrder($order, $request->sortby, $columns[$column])]))}}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($accounts as $index => $account)
                                        <tr onclick="window.location.href='{{ route('user', ['id' => $account->user->id]) }}';">
                                            <td>{{ $index + 1 }}</td>
                                            <td class="col-md-2">{{ $account->number }}</td>
                                            <td class="col-md-2">{{ $account->account_type->name }}</td>
                                            <td class="col-md-2">{{ $account->balance }}</td>
                                            <td class="col-md-2">{{ $account->user->name }}</td>
                                            <td class="col-md-2">{{ $account->user->phone }}</td>
                                            <td class="col-md-2">{{ $account->user->email }}</td>
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
                        {{ Form::open(array('action' => array('AdminController@accounts'), 'method' => 'get')) }}
                        <input name="search" type="hidden" value="1">
                        <label for="account">Search by account number</label>
                        <input id="account" class="form-control" name="account" value="{{ Request::get('account') }}">
                        <label for="type">Search by type</label>
                        <select id="type" class="form-control" name="type">
                            <option value="" selected></option>
                            <option value="1" {{ Request::get('type') == 1 ? 'selected' : ''}}>Лицевой</option>
                            <option value="2" {{ Request::get('type') == 2 ? 'selected' : ''}}>Инвесторский</option>
                        </select>
                        <label for="from">Search by balance</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="from" class="form-control" name="from" value="{{ Request::get('from') }}"
                                       placeholder="from">
                            </div>
                            <div class="col-xs-6">
                                <input id="to" class="form-control" name="to" value="{{ Request::get('to') }}"
                                       placeholder="to">
                            </div>
                        </div>
                        <label for="name">Search by name</label>
                        <input id="name" class="form-control" name="name" value="{{ Request::get('name') }}">
                        <label for="email">Search by email</label>
                        <input id="email" class="form-control" name="email" value="{{ Request::get('email') }}">
                        <label for="phone">Search by phone</label>
                        <input id="phone" class="form-control" name="phone" value="{{ Request::get('phone') }}">

                        <button class="btn btn-primary" type="submit">OK</button>
                        <a class="btn btn-primary" href="{{ route('accounts') }}" role="button">Сбросить</a>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
                {{ $accounts->appends(Request::input())->links() }}
            </div>
        </div>
    </div>
@endsection
