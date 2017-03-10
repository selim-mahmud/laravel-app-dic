@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@push('scripts_stack')

@endpush

@section('header')
    @include('_partials.header_control')
@stop

@section('left_sidebar')
    @include('_partials.left_sidebar_school')
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
            <div style="min-height:700px; padding:20px 0;">
                <a class="btn btn-primary" href="{{ url('school/instructors/create') }}">Add New</a>
                <br/>
                <br/>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">List of instructors</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Short description</th>
                                    <th>Long description</th>
                                    <th>Avatar</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($instructors as $instructor)
                                    <tr>
                                        <td>{{$instructor->name}}</td>
                                        <td>{{$instructor->email}}</td>
                                        <td>{{$instructor->phone}}</td>
                                        <td>{{$instructor->short_desc}}</td>
                                        <td>{{$instructor->long_desc}}</td>
                                        <td>
                                            @if($instructor->profile_photo_url != '')
                                                <img width="80" src="{{asset($instructor->profile_photo_url)}}" alt="avatar">
                                            @endif
                                        </td>
                                        <td>
                                            <div style="width:89px" class="btn-group">
                                                <a type="button" class="btn btn-info"
                                                   href="{{action('InstructorController@edit', $instructor->id)}}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                {!! Form::open(['method' => 'delete', 'action' => array('InstructorController@destroy', $instructor->id), 'class' => 'form-inline']) !!}
                                                <button type="submit" class="btn btn-info dark"
                                                        onClick="javascript: return confirm('Are you sure to delete!');">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                {{ Form::close() }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts_stack')

@endpush