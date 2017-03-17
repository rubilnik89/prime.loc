@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <a href="{{ route('users') }}">Пользователи</a>
                <a href="{{ route('accounts') }}">Счета</a>
            </div>
            <div class="col-md-9">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        @foreach(array_keys($columns) as $column)
                            @if ($sortby == $columns[$column] && $order == 'asc')
                                <th>
                                    {{link_to_action(
                                      'AdminController@accountSearch',
                                      $column, ['sortby' => $columns[$column],
                                      'order' => 'desc',
                                      'name' => $data['name'],
                                      'phone' => $data['phone'],
                                      'email' => $data['email'],
                                      'account' => $data['account'],
                                      'type' => $data['type'],
                                      ])}}<i class="fa fa-fw fa-sort-desc"></i>
                            @elseif ($sortby == $columns[$column] && $order == 'desc')
                                <th>{{link_to_action(
                                       'AdminController@accountSearch',
                                       $column, ['sortby' => $columns[$column],
                                       'order' => 'asc',
                                       'name' => $data['name'],
                                       'phone' => $data['phone'],
                                       'email' => $data['email'],
                                       'account' => $data['account'],
                                       'type' => $data['type'],
                                      ])}}<i class="fa fa-fw fa-sort-asc"></i>
                            @else
                                <th>
                                    {{link_to_action(
                                        'AdminController@accountSearch',
                                        $column , ['sortby' => $columns[$column],
                                        'order' => 'asc',
                                        'name' => $data['name'],
                                        'phone' => $data['phone'],
                                        'email' => $data['email'],
                                        'account' => $data['account'],
                                        'type' => $data['type'],]
                                    )}} <i class="fa fa-fw fa-sort"></i>
                                    @endif
                                </th>
                                @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts as $index => $account)
                        <tr onclick="window.location.href='{{ route('user', ['id' => $account->user->id]) }}';">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $account->number }}</td>
                            <td>{{ $account->account_type->name }}</td>
                            <td>{{ $account->user->name }}</td>
                            <td>{{ $account->user->phone }}</td>
                            <td>{{ $account->user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                {{ Form::open(array('action' => array('AdminController@accountSearch'), 'method' => 'get')) }}
                <label for="account">Search by account number</label>
                <input id="account" class="form-control" name="account" value="{{ old('account') }}">
                <label for="type">Search by type</label>
                <select id="type" class="form-control" name="type">
                    <option value="" disabled selected></option>
                    <option value="1">Лицевой</option>
                    <option value="2">Инвесторский</option>
                </select>
                <label for="name">Search by name</label>
                <input id="name" class="form-control" name="name" value="{{ old('name') }}">
                <label for="email">Search by email</label>
                <input id="email" class="form-control" name="email" value="{{ old('email') }}">
                <label for="phone">Search by phone</label>
                <input id="phone" class="form-control" name="phone" value="{{ old('phone') }}">

                <button class="btn btn-primary" type="submit">OK</button>
                {{ Form::close() }}
            </div>
            <div class="col-md-12">
                {{ $accounts->appends(['sortby'=>$sortby, 'order'=>$order])->links() }}
            </div>
        </div>
    </div>
@endsection
