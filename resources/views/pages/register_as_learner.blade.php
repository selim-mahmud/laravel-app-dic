
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
					  <li><a href="#">Library</a></li>
					  <li class="active">Data</li>
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
						<h2 class="form-header black333">Register as a learner</h2>
						<form class="el-form-2" id="el-form-2">

							<div class="top20">
								<input type="text" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Your name" />
							</div>

							<div class="top20">
								<input type="text" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="your display name" />
							</div>

							<div class="top20">
								<input type="email" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Your email" />
							</div>

							<div class="top20">
								<input type="password" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Password" />
							</div>	

							<div class="top20">
								<input type="password" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Confirm password" />
							</div>		

							<div class="top20">
								<input type="submit" value="REGISTER" class="submit-btn button1-1 b-radius3 right30 button-blue top20">
							</div>
						</form>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="form-header black333">OR register using your facebook</h2>
					</div>
				</div>

			</div>	
		</div>
	</div>
	<br />
@stop