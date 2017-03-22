@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                    <a class="list-group-item active" href="{{ route('accounts') }}">Счета</a>
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
                                        <th class="col-md-1">#</th>
                                        @foreach(array_keys($columns) as $column)
                                            @if ($sortby == $columns[$column] && $order == 'asc')
                                                <th class="col-md-2">
                                                    {{link_to_action(
                                                      'AdminController@accounts',
                                                      $column, ['sortby' => $columns[$column],
                                                      'order' => 'desc',
                                                      'name' => $data['name'],
                                                      'phone' => $data['phone'],
                                                      'email' => $data['email'],
                                                      'account' => $data['account'],
                                                      'type' => $data['type'],
                                                      'from' => $data['from'],
                                                      'to' => $data['to'],
                                                      ])}}<i class="fa fa-fw fa-sort-desc"></i>
                                            @elseif ($sortby == $columns[$column] && $order == 'desc')
                                                <th class="col-md-2">
                                                    {{link_to_action(
                                                       'AdminController@accounts',
                                                       $column, ['sortby' => $columns[$column],
                                                       'order' => 'asc',
                                                       'name' => $data['name'],
                                                       'phone' => $data['phone'],
                                                       'email' => $data['email'],
                                                       'account' => $data['account'],
                                                       'type' => $data['type'],
                                                       'from' => $data['from'],
                                                       'to' => $data['to'],
                                                       ])}}<i class="fa fa-fw fa-sort-asc"></i>
                                            @else
                                                <th class="col-md-2">
                                                    {{link_to_action(
                                                        'AdminController@accounts',
                                                        $column , ['sortby' => $columns[$column],
                                                        'order' => 'asc',
                                                        'name' => $data['name'],
                                                        'phone' => $data['phone'],
                                                        'email' => $data['email'],
                                                        'account' => $data['account'],
                                                        'type' => $data['type'],
                                                        'from' => $data['from'],
                                                        'to' => $data['to'],
                                                        ])}} <i class="fa fa-fw fa-sort"></i>
                                                    @endif
                                                </th>
                                                @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($accounts as $index => $account)
                                        <tr onclick="window.location.href='{{ route('user', ['id' => $account->user->id]) }}';">
                                            <td class="col-md-1">{{ $index + 1 }}</td>
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
                        <label for="account">Search by account number</label>
                        <input id="account" class="form-control" name="account" value="{{ old('account') }}">
                        <label for="type">Search by type</label>
                        <select id="type" class="form-control" name="type">
                            <option value="" disabled selected></option>
                            <option value="1">Лицевой</option>
                            <option value="2">Инвесторский</option>
                        </select>
                        <label for="from">Search by balance</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="from" class="form-control" name="from" value="{{ old('from') }}"
                                       placeholder="from">
                            </div>
                            <div class="col-xs-6">
                                <input id="to" class="form-control" name="to" value="{{ old('to') }}" placeholder="to">
                            </div>
                        </div>
                        <label for="name">Search by name</label>
                        <input id="name" class="form-control" name="name" value="{{ old('name') }}">
                        <label for="email">Search by email</label>
                        <input id="email" class="form-control" name="email" value="{{ old('email') }}">
                        <label for="phone">Search by phone</label>
                        <input id="phone" class="form-control" name="phone" value="{{ old('phone') }}">

                        <button class="btn btn-primary" type="submit">OK</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-10">
                {{ $accounts->appends(['sortby'=>$sortby, 'order'=>$order])->links() }}
            </div>
        </div>
    </div>
@endsection
