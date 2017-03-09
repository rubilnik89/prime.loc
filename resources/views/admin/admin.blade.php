@extends('layouts.app')

@section('content')
    @php
        include_once('../app/countries.php');
    @endphp
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr onclick="window.location.href='admin/user/{{ $user->id }}';">
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
        <div class="col-md-3">
                {{ Form::open(array('url' => 'admin/search')) }}
                    <input class="form-control" placeholder="Search by name" name="name">
                    <input class="form-control" placeholder="Search by surname" name="surname">
                    <input class="form-control" placeholder="Search by email" name="email">
                    <input class="form-control" placeholder="Search by phone" name="phone">
                    <select class="form-control" name="country">
                        <option value="" disabled selected>Search by country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country['country_id'] }}">
                                {{ $country['name'] }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">OK</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
