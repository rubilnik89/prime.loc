@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('users') }}">Пользователи</a>
            <a href="{{ route('accounts') }}">Счета</a>
        </div>
        <div class="col-md-9">

            <table id="example" class="table table-hover table-striped">
                <thead>
                <tr>
                    @foreach(array_keys($columns) as $column)
                        <th>
                            @if ($sortby == $columns[$column] && $order == 'asc')
                                {{link_to_action(
                                  'AdminController@main',
                                  $column, ['sortby' => $columns[$column],'order' => 'desc']
                                )}}
                            @else
                                {{link_to_action(
                                  'AdminController@main',
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
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-2">
                {{ Form::open(array('action' => array('AdminController@search'), 'method' => 'get')) }}
                    <label for="name">Search by name</label>
                    <input id="name" class="form-control" name="name" value="{{ old('name') }}">
                    <label for="surname">Search by surname</label>
                    <input id="surname" class="form-control" name="surname" value="{{ old('surname') }}">
                    <label for="email">Search by email</label>
                    <input id="email" class="form-control" name="email" value="{{ old('email') }}">
                    <label for="phone">Search by phone</label>
                    <input id="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                    <label for="country">Search by country</label>
                    <select id="country" class="form-control" name="country">
                        <option value="" disabled selected></option>
                        @foreach($countries as $country)
                            <option>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">OK</button>
                {{ Form::close() }}
        </div>
        <div class="col-md-12">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
