@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
@stop

@push('styles_stack')

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
                <a class="btn btn-primary" href="{{ action('InstructorController@index') }}">Go back</a>
                <br/>
                <br/>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="panel-title">Instructor details</span>
                    </div>
                    <div class="panel-body">
                        <table id="user" class="table table-bordered table-striped" style="clear: both">
                            <tbody>
                            <tr>
                                <td style="width: 35%;">Name</td>
                                <td style="width: 65%;">{{$instructor->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$instructor->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{$instructor->phone}}</td>
                            </tr>
                            <tr>
                                <td>Services</td>
                                <td>
                                    <div style="margin:15px;">
                                        @if(!$services->isEmpty())
                                            @foreach($services as $service)
                                                <span style="padding:15px 10px; font-size: 16px;"
                                                      class="tm-tag tm-tag-info"><span>{{$service->name}}</span></span>
                                            @endforeach
                                        @else
                                            No service added
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Avatar</td>
                                <td>
                                    @if($instructor->profile_photo_url != '')
                                        <img width="120" src="{{asset($instructor->profile_photo_url)}}"
                                             alt="avatar">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Short description</td>
                                <td>{{$instructor->short_desc}}</td>
                            </tr>
                            <tr>
                                <td>Long description</td>
                                <td>{{$instructor->long_desc}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts_stack')

@endpush