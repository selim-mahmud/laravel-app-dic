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
    {!! Form::open(['method' => 'post', 'action' => 'SchoolContactController@store']) !!}
        @include('school/contacts/partials/_form', ['heading_text' =>'Add a contact', 'submit_text' => 'Add Contact'])
    {!! Form::close() !!}
@stop

@push('scripts_stack')

@endpush

