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
    @include('_partials.left_sidebar_staff')
@stop

@section('breadcrumb')
    @include('_partials.breadcrumb_control')
@stop

@section('flash_message')
    @include('_partials.control_flash_message')
@stop

@section('content')
    {!! Form::open(['method' => 'post', 'action' => 'StaffPostController@store', 'files' => true]) !!}
        @include('staff/posts/partials/_form', ['heading_text' =>'Add a post', 'submit_text' => 'Add post'])
    {!! Form::close() !!}
@stop

@push('scripts_stack')

@endpush

