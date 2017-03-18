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
                    <span class="panel-title">List of all schools</span>
                </div>
                <div style="padding: 20px 0;" class="panel-body">
                    @if(!$schools->isEmpty())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Short description</th>
                                    <th>Long description</th>
                                    <th>Website</th>
                                    <th>Facebook</th>
                                    <th>Shadow</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schools as $school)
                                    <tr>
                                        <td>{{$school->id}}</td>
                                        <td>{{$school->name}}</td>
                                        <td>{{$school->short_desc}}</td>
                                        <td>{{$school->long_desc}}</td>
                                        <td>{{$school->website}}</td>
                                        <td>{{$school->facebook}}</td>
                                        <td><a href="{{url('staff/schools/shadow', [$school->users->first()])}}" class="btn btn-success">Shadow</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $schools->links() }}
                        </div>
                    @else
                        <h4>No school found.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts_stack')
@endpush