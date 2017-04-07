@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
@stop

@push('styles_stack')
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css') }}
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
    {!! Form::model($schoolContact, ['method' => 'PATCH', 'action' => ['SchoolContactController@update', $schoolContact->id]]) !!}

    @include('school/contacts/partials/_form', ['heading_text' =>'Update a contact', 'submit_text' => 'Update Contact'])

    {!! Form::close() !!}
@stop

@push('scripts_stack')

@endpush