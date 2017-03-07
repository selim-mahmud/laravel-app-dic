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
	<div class="row">
		<div class="col-md-6">
			<div style="min-height:700px; padding:20px 0;">
				<h1>Add an instructors</h1>
				{!! Form::open(['method' => 'post', 'action' => 'InstructorController@store']) !!}
					@include('school/instructors/partials/_form', ['submit_text' => 'Add Instructor'])
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop

@push('scripts_stack')

@endpush