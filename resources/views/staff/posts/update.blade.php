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
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['StaffPostController@update', $post->id], 'files' => true]) !!}

    @include('staff/posts/partials/_form', ['heading_text' =>'Update a post', 'submit_text' => 'Update post'])

    {!! Form::close() !!}
@stop

@push('scripts_stack')

@endpush