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
    @include('_partials.left_sidebar_learner')
@stop

@section('breadcrumb')
    @include('_partials.breadcrumb_control')
@stop

@section('flash_message')
    @include('_partials.flash_message')
@stop

@section('content')
    <section id="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-title">Your details</span>
            </div>
            <div class="panel-body">
                <table id="user" class="table table-bordered table-striped" style="clear: both">
                    <tbody>
                    <tr>
                        <td style="width: 35%;">Profile photo</td>
                        <td style="width: 65%;">
                            @if(Auth::user()->profile_photo_url)
                                <img src="{{Auth::user()->profile_photo_url}}" alt="profile photo" />
                            @else
                                <img src="{{asset(config('dic.default_learner_profile_photo'))}}" alt="profile photo" />
                            @endif
                            &nbsp; &nbsp; <a href="/" class="btn btn-xs btn-primary">Change</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            {{Auth::user()->name}} &nbsp; &nbsp;
                            <a href="/" class="btn btn-xs btn-primary">Change</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Display name</td><td>
                            {{Auth::user()->display_name}}
                            &nbsp; &nbsp; <a href="/" class="btn btn-xs btn-primary">Change</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td><td>
                            {{Auth::user()->email}}
                            &nbsp; &nbsp; <a href="/" class="btn btn-xs btn-primary">Change</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            ***************
                            &nbsp; &nbsp; <a href="/" class="btn btn-xs btn-primary">Change</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop

@push('scripts_stack')

@endpush