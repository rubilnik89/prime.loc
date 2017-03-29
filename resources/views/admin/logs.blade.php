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
            <div class="col-md-8">
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
                                        <tr>
                                        {{--<tr data-toggle="collapse" data-target="#property{{ $log->id }}" class="clickable">--}}
                                            <td data-toggle="collapse" data-target="#property{{ $log->id }}" class="clickable">{{ $index + 1 }}</td>
                                            <td class="col-md-2 clickable" data-toggle="collapse" data-target="#property{{ $log->id }}">{{ $log->log_name }}</td>
                                            <td class="col-md-2 clickable" data-toggle="collapse" data-target="#property{{ $log->id }}">{{ $log->description }}</td>
                                            <td class="col-md-2 clickable" data-toggle="collapse" data-target="#property{{ $log->id }}">{{ $log->subject_id }}</td>
                                            <td class="col-md-2 clickable" data-toggle="collapse" data-target="#property{{ $log->id }}">{{ $log->subject_type }}</td>
                                            <td class="col-md-2"><a href='{{ route('user', ['id' => $log->causer_id ?: 1]) }}'>{{ $log->causer_id ? $log->user->email : 'admin' }}</a></td>
                                            <td class="col-md-2 clickable" data-toggle="collapse" data-target="#property{{ $log->id }}">{{ $log->created_at }}</td>
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
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ Form::open(array('action' => array('LogController@all'), 'method' => 'get')) }}
                        <input name="search" type="hidden" value="1">
                        <label for="log_name">Search by Log name</label>
                        <input id="log_name" class="form-control" name="log_name" value="{{ Request::get('log_name') }}">
                        <label for="description">Search by Description</label>
                        <input id="description" class="form-control" name="description" value="{{ Request::get('description') }}">
                        <label for="subject_type">Search by Subject type</label>
                        <input id="subject_type" class="form-control" name="subject_type" value="{{ Request::get('subject_type') }}">
                        <label for="properties">Search by properties</label>
                        <input id="properties" class="form-control" name="properties" value="{{ Request::get('properties') }}">

                        <button class="btn btn-primary" type="submit">OK</button>
                        <a class="btn btn-primary" href="{{ route('logs') }}" role="button">Сбросить</a>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
                {{ $logs->appends(Request::input())->links() }}
            </div>
        </div>
    </div>
@endsection
