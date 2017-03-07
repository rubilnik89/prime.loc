@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <table class="table table-hover">
                <thead>
                <tr>
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
                    @foreach($users as $user)
                        <tr>
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

        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        </div>
            <div class="col-md-3">
                <form method="post" action="searchName" class="form-inline">
                    <div class="form-group mx-sm-3">
                        <input class="form-control" placeholder="Search by name" name="name">
                        <button class="btn btn-primary" type="submit">OK</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form method="post" action="searchSurame" class="form-inline">
                    <div class="form-group mx-sm-3">
                        <input class="form-control" placeholder="Search by surname" name="surname">
                        <button class="btn btn-primary" type="submit">OK</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form method="post" action="searchEmail" class="form-inline">
                    <div class="form-group mx-sm-3">
                        <input class="form-control" placeholder="Search by email" name="email">
                        <button class="btn btn-primary" type="submit">OK</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form method="post" action="searchPhone" class="form-inline">
                    <div class="form-group mx-sm-3">
                        <input class="form-control" placeholder="Search by phone" name="phone">
                        <button class="btn btn-primary" type="submit">OK</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>

        @php
        include('../app/countries.php');
        @endphp

            <div class="col-md-3">
                <form method="post" action="searchCountry" class="form-inline">
                    <div class="form-group mx-sm-3">
                        <select class="form-control" name="country" style="width: 180px">
                            <option>Search by country</option>

                            @foreach($countries as $country)
                                <option value="{{ $country['country_id'] }}">
                                    {{ $country['name'] }}
                                </option>
                            @endforeach

                        </select>
                        <button class="btn btn-primary" type="submit">OK</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection
