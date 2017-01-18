@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 style="font-weight: bold">Admin User Edit Page </h3>

                        <a href="{{route('control.page')}}" class="btn btn-large btn-link"> <span  class="glyphicon glyphicon-arrow-up"></span> Admin Panel</a>
                        <a href="{{route('control.users.index')}}" class="btn btn-large btn-link"> <span  class="glyphicon glyphicon-user"></span> Show All User</a>
                        <a href="{{route('control.users.create')}}" class="btn btn-large btn-link"> <span  class="glyphicon glyphicon-user"></span> Create New User</a>
                    </div>
                    <div class="panel-body">

                       This will user edit page

                    </div>
                    <div class="panel-footer">
                        This is panel footer
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection