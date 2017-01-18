@extends('layouts.main');

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>Admin Activity Page</h2>
                <div class="list-group">
                    <a href="{{route('control.users.index')}}" class="list-group-item">Show All User</a>
                    <a href="{{route('control.users.create')}}" class="list-group-item">Create A New User</a>
                    <a href="{{route('control.sendEmail')}}" class="list-group-item">Send a test mail</a>
                    <a href="{{url('#')}}" class="list-group-item">Coming Soon...</a>
                </div>

            </div>
        </div>
    </div>
@endsection