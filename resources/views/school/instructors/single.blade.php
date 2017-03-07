@extends('layouts.control')

@section('meta')
	<title>This is the title of the page</title>
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="min-height:700px; padding:20px 0;">
					<a class="btn btn-primary" href="{{ action('SubjectController@index') }}">Go back</a>
					<br />
					<br />
				    <table class="table table-bordered">
  						<tr>
  							<td>Number</td>
  							<td>{{$subject->id}}</td>
  						</tr>
  						<tr>
  							<td>Exam Name</td>
  							<td>{{$subject->exam->title}}</td>
  						</tr>
  						<tr>
  							<td>Subject Name</td>
  							<td>{{$subject->title}}</td>
  						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop