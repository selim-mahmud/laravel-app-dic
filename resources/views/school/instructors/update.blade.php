@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
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
    {!! Form::model($instructor, ['method' => 'PATCH', 'action' => ['InstructorController@update', $instructor->id], 'files' => true]) !!}

    @include('school/instructors/partials/_form', ['heading_text' =>'Update an instructors', 'submit_text' => 'Update Instructor'])

    {!! Form::close() !!}
@stop

@push('scripts_stack')
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}
<script type="text/javascript">
    $(".service_multiple").select2({
        placeholder: 'Select one or more services'
    });
</script>
@endpush