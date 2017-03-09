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
    {!! Form::open(['method' => 'post', 'action' => 'InstructorController@store', 'files' => true]) !!}
        @include('school/instructors/partials/_form', ['heading_text' =>'Add an instructors', 'submit_text' => 'Add Instructor'])
    {!! Form::close() !!}
@stop

@push('scripts_stack')

@endpush