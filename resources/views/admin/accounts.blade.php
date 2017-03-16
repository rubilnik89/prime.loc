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
                    @foreach(array_keys($columns) as $column)
                        <th>
                        @if ($sortby == $columns[$column] && $order == 'asc')
                            {{link_to_action(
                              'AdminController@accounts',
                              $column, ['sortby' => $columns[$column],'order' => 'desc']
                            )}}
                        @else
                            {{link_to_action(
                              'AdminController@accounts',
                              $column, ['sortby' => $columns[$column],'order' => 'asc']
                            )}}
                        @endif
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr onclick="window.location.href='{{ route('user', ['id' => $user->id]) }}';">
                        <td>{{ $index +1 }}</td>
                        <td>{{ $user->accounts[0]->number }}</td>
                        <td>{{ $investor[$index] }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
{{--            {{ $users->links() }}--}}
            {{ $users->appends([])->links() }}
        </div>
    </div>
</div>
@endsection
