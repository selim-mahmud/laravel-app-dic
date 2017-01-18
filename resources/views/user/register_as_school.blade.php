
@extends('layouts.main')

@section('meta')
	<title>Register as School</title>
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@section('breadcrum')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					  <li><a href="/">Home</a></li>
					  <li class="active">Register as school</li>
				</ol>
			</div>
		</div>
	</div>
@stop


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="form-header black333">Register as a driving school</h2>

						{!! Form::open (['method'=>'POST', 'action'=> 'UserController@store']) !!}
							<input type="hidden" name="registration_type" value="1"/>

							<div class="top20">
								{!! Form::text('name', null, ['class'=>'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder'=>'Your name']) !!}
								@if ($errors->has('name'))<p class="alert alert-danger error_block">{!!$errors->first('name')!!}</p>@endif
							</div>
							<div class="top20">
								{!! Form::text('school_name', null, ['class'=>'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder'=>'Driving school name']) !!}
								@if ($errors->has('school_name'))<p class="alert alert-danger error_block">{!!$errors->first('school_name')!!}</p>@endif
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