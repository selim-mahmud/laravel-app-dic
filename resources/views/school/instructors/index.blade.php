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
		<div class="col-md-12">
			<div style="min-height:700px; padding:20px 0;">
				<a class="btn btn-primary" href="{{ url('school/instructors/create') }}">Add New</a>
				<br />
				<br />
				<table id="sort_table" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>id</th>
							<th>Exam Title</th>
							<th>Subject Title</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($instructors as $instructor)
							<tr>
									<td> <a href="{{action('SubjectController@show', $subject->id)}}">{{$subject->id}}</a></td>
									<td>{{$instructor->exam->title}}</td>
									<td>{{$instructor->title}}</td>
									<td>
										<a href="{{action('SubjectController@edit', $instructor->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

										{!! Form::open(['method' => 'delete', 'action' => array('SubjectController@destroy', $subject->id), 'class' => 'form-inline']) !!}
											<button onClick="javascript: return confirm('Are you sure to delete!');" class="delete_button" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i></button>
										{{ Form::close() }}
									</td>
								</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
@push('scripts_stack')

@endpush