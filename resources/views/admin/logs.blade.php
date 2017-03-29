@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a class="list-group-item" href="{{ route('users') }}">Пользователи</a>
                    <a class="list-group-item" href="{{ route('accounts') }}">Счета</a>
                    <a class="list-group-item" href="{{ route('tarifs') }}">Тарифы</a>
                    <a class="list-group-item active" href="{{ route('logs') }}">Логи</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Logs</div>
                            <div class="panel-body">

                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        @foreach(array_keys($columns) as $column)
                                            <th class="col-md-1">
                                                <i class="fa fa-sort{{ ($sortby == $columns[$column]) ? getSort($order) : '' }}"></i>
                                                {{link_to_action(
                                                    'LogController@all',
                                                     $column, array_merge($request->all(), ['sortby' => $columns[$column], 'order' => getNextOrder($order, $request->sortby, $columns[$column])]))}}
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($logs as $index => $log)
                                        <tr data-toggle="collapse" data-target="#property{{ $log->id }}" class="clickable">
                                            <td>{{ $index + 1 }}</td>
                                            <td class="col-md-1">{{ $log->log_name }}</td>
                                            <td class="col-md-1">{{ $log->description }}</td>
                                            <td class="col-md-1">{{ $log->subject_id }}</td>
                                            <td class="col-md-2">{{ $log->subject_type }}</td>
                                            <td class="col-md-1">{{ $log->causer_id }}</td>
                                            <td class="col-md-2">{{ $log->causer_type }}</td>
                                            <td class="col-md-3">{{ $log->created_at }}</td>
                                        </tr>
                                        <tr id="property{{ $log->id }}" class="collapse">
                                            <td colspan="8">
                                                <pre>{{ $log->properties }}</pre>
                                            </td>
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
        <div class="col-md-10 col-md-offset-2">
            {{ $logs->appends(Request::input())->links() }}
        </div>
    </div>
@endsection
