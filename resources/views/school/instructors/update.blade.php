
@extends('layouts.control')

@section('meta')
	<title>This is the title of the page</title>
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div style="min-height:700px; padding:20px 0;">
				<h1>Update the subject</h1>
					{!! Form::model($subject, ['method' => 'PATCH', 'action' => ['SubjectController@update', $subject->id]]) !!}

				        @include('control/subject/partials/_form', ['submit_text' => 'Update Subject'])

				    {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
@stop