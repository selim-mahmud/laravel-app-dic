@extends('layouts.main')

@section('breadcrum')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">Show All User</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 style="font-weight: bold">User Administration <small> Click a user to edit</small></h3>

                    <a href="{{route('control.page')}}" class="btn btn-large btn-link"> <span  class="glyphicon glyphicon-arrow-up"></span> Admin Panel</a>
                    <a href="{{route('control.users.create')}}" class="btn btn-large btn-link"> <span  class="glyphicon glyphicon-user"></span> Create New User</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($users)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->user_id}}</td>
                                        {{--<td><img height="40" width="45" src="{{$user->photo ? $user->photo->file : '/images/default.jpg'}}" alt="No Image"></td>--}}
                                        <td>{{$user->image_name}}</td>
                                        <td><a href="{{route('control.users.edit', $user->user_id)}}">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role->role_title}}</td>
                                        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        This is panel footer
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection