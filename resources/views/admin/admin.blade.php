@extends('layouts.app')

@section('content')
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
                {{--{{ Form::open(array('url' => 'admin/search')) }}--}}
                {{ Form::open(array('action' => array('AdminController@search'))) }}
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
                            <option value="{{ $country->country_id }}">
                                {{ $country->name }}
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
