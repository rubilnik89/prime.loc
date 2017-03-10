@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h2>Name</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $user->name }}</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>Surame</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $user->surname }}</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>Email</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $user->email }}</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>Phone</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $user->phone }}</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>Country</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $user->country }}</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>Created at</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $user->created_at }}</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>Updated at</h2>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $user->updated_at }}</h2>
                    </div>
                </div>
            </div>

            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div>

            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Some content in menu 2.</p>
            </div>
        </div>
    </div>
</div>
@endsection
