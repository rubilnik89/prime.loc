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
                                  'AdminController@accounts',
                                  $column, ['sortby' => $columns[$column],'order' => 'desc']
                                )}}<i class="fa fa-fw fa-sort-desc"></i>
                        @elseif ($sortby == $columns[$column] && $order == 'desc')
                            <th>{{link_to_action(
                                  'AdminController@accounts',
                                  $column, ['sortby' => $columns[$column],'order' => 'asc']
                                )}}<i class="fa fa-fw fa-sort-asc"></i>
                        @else
                            <th>
                                {{link_to_action(
                              'AdminController@accounts',
                              $column , ['sortby' => $columns[$column],'order' => 'asc']
                                )}} <i class="fa fa-fw fa-sort"></i>
                            @endif
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $index => $account)
                        {{--<tr onclick="window.location.href='{{ route('user', ['id' => $user->id]) }}';">--}}
                        <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $account->number }}</td>
                        <td>{{ $account->type_id }}</td>
                        <td>{{ $account->user->name }}</td>
                        <td>{{ $account->user->phone }}</td>
                        <td>{{ $account->user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
{{--            {{ $users->links() }}--}}
            {{ $users->appends(['sortby'=>$sortby, 'order'=>$order])->links() }}
        </div>
    </div>
</div>
@endsection
