
@extends('layouts.main')

@section('meta')
	<title>Register as a learner - Driving Instructors Directory</title>
	<meta name="description" content="Register yourself as a learner, search our database to find your nearest driving instructors and school. Get driving lesson and write a review for your instructors">
	<meta name="keywords" content="register, driving learner, nearest driving instructors">
@stop

@section('breadcrum')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					  <li><a href="/">Home</a></li>
					  <li class="active">Register as learner</li>
				</ol>
			</div>
		</div>
	</div>
@stop

@section('content')

	<div ng-controller="homeController" class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="form-header black333">Register as a learner</h2>

						{!! Form::open (['method'=>'POST', 'action'=> 'UserController@store']) !!}
						<input type="hidden" name="registration_type" value="2"/>

						<div class="top20">
							{!! Form::text('name', null, ['class'=>'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder'=>'Your name']) !!}
							@if ($errors->has('name'))<p class="alert alert-danger error_block">{!!$errors->first('name')!!}</p>@endif
						</div>
						<div class="top20">
							{!! Form::email('email', null, ['class'=>'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder'=>'Your email']) !!}
							@if ($errors->has('email'))<p class="alert alert-danger error_block">{!!$errors->first('email')!!}</p>@endif
						</div>
						<div class="top20">
							{!! Form::password('password', ['class'=>'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder'=>'Password']) !!}
							@if ($errors->has('password'))<p class="alert alert-danger error_block">{!!$errors->first('password')!!}</p>@endif
						</div>
						<div class="top20">
							{!! Form::password('confpass', ['class'=>'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder'=>'Confirm password']) !!}
							@if ($errors->has('confpass'))<p class="alert alert-danger error_block">{!!$errors->first('confpass')!!}</p>@endif
						</div>
						<div class="top20">
							{!! Form::submit('REGISTER', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
						</div>

						{!! Form::close() !!}

						@if ($errors->has())
							<p style="color:red;">
								@foreach ($errors->all() as $error)
									{!! $error !!}<br />
								@endforeach
							</p>
						@endif


					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 style="margin-top: 20px;" class="centerBlock form-header black333"><span class="primary_color">OR</span> register using your facebook</h2>

						<a class="b-radius3 btn-social btn-fb centerBlock button-blue" href="{{url('facebook-register')}}"><span class="fa fa-facebook"></span> Register with Facebook</a>

						<br />
						<br />
					</div>
				</div>

			</div>	
		</div>
	</div>
	<br />
@stop