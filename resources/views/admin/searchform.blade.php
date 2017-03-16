{{--@extends('admin')--}}

{{--@section('searchform')--}}

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
{{--@endsection--}}