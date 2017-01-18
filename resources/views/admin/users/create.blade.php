@extends('layouts.main')

@section('breadcrum')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">Create New User</li>
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
                        <h3 style="font-weight: bold">Create User From </h3>

                        <a href="{{route('control.page')}}" class="btn btn-large btn-link"> <span  class="glyphicon glyphicon-arrow-up"></span> Admin Panel</a>
                        <a href="{{route('control.users.index')}}" class="btn btn-large btn-link"> <span  class="glyphicon glyphicon-user"></span> Show All User</a>
                    </div>
                    <div class="panel-body">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#School" data-toggle="tab">New School Registration</a></li>
                            <li ><a href="#Learner" data-toggle="tab">New Learner Account</a></li>
                        </ul>


                        <div class="tab-content">

                            <div class="tab-pane active" id="School">
                                Driving School Registration From
                            </div>

                            <div class="tab-pane" id="Learner">
                                Learner Account Form
                            </div>

                        </div>


                    </div>
                    <div class="panel-footer">
                        This is panel footer
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection