@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@push('styles_stack')
@endpush

@section('header')
    @include('_partials.header_control')
@stop

@section('left_sidebar')
    @include('_partials.left_sidebar_staff')
@stop

@section('breadcrumb')
    @include('_partials.breadcrumb_control')
@stop

@section('flash_message')
    @include('_partials.control_flash_message')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">List of all users</span>
                </div>
                <div style="padding: 20px 0;" class="panel-body">
                    @if(!$users->isEmpty())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Display name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->display_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->user_type}}</td>
                                        <td>{{$user->status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    @else
                        <h4>No user found.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts_stack')
@endpush