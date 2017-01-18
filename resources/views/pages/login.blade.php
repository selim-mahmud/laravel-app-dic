
@extends('layouts.main')

@section('meta')
	<title>Australian Driving Instructors Directory</title>
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop


@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li class="active">Login</li>
				</ol>
			</div>
		</div>
	</div>

	<br />

	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="form-header black333">LOG IN</h2>

						{!! Form::open (['method'=>'POST', 'action'=> 'UserController@postLogin']) !!}
							<div class="form-group">
								{!! Form::text('email', null, ['class'=>'form-1-style2 border1 borderddd p-right0 b-radius3', 'placeholder'=>'john@msn.net']) !!}
								@if ($errors->has('email'))<p class="alert alert-danger error_block">{!!$errors->first('email')!!}</p>@endif
							</div>
							<div class="form-group">
								{!! Form::password('password', ['class'=>'form-1-style2 border1 borderddd p-right0 b-radius3', 'placeholder'=>'Password' ]) !!}
								@if ($errors->has('password'))<p class="alert alert-danger error_block">{!!$errors->first('password')!!}</p>@endif
							</div>
							{{--<div class="form-group">
								{!! Form::checkbox('admin', 1, null) !!}
							</div>--}}
							<div class="top20 checkbox checkbox-1">
								<input id="check1" type="checkbox" name="remember" value="check1" checked>
								<label for="check1">Remember me</label>
							</div>
							<div class="form-group">
								{!! Form::submit('Login', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
							</div>

						{!! Form::close() !!}

						{{--<form class="el-form-2" id="el-form-2">

							<div class="top20">
								<input type="email" class="form-1-style2 border1 borderddd p-right0 b-radius3" placeholder="john@msn.net" />
							</div>

							<div class="top20">
								<input type="password" class="form-1-style2 border1 borderddd p-right0 b-radius3" placeholder="Password" />
							</div>			
				
							<div class="top20 checkbox checkbox-1">
								<input id="check1" type="checkbox" name="check" value="check1" checked>
								<label for="check1">Remember me</label>
							</div>	

							<div class="top20">
								<input type="submit" value="LOG IN" class="submit-btn button1-1 b-radius3 right30 button-blue top20">
							</div>
						</form>--}}
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="form-header black333">OR Use Facebook</h2>
					</div>
				</div>

			</div>	
		</div>
	</div>
	<br />
@stop