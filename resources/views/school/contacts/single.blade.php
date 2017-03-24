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
                <a class="btn btn-primary" href="{{ action('SchoolContactController@index') }}">Go back</a>
                <br/>
                <br/>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="panel-title">Contact details</span>
                    </div>
                    <div class="panel-body">
                        <table id="user" class="table table-bordered table-striped" style="clear: both">
                            <tbody>
                                <tr>
                                    <td style="width: 35%;">Address</td>
                                    <td style="width: 65%;">{{$contact->address}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$contact->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$contact->phone}}</td>
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