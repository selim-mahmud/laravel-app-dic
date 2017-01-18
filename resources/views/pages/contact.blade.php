
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

	<div class="listing-details-main">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<h5 class="color333"><span class="extrabold uppercase bgfff p-right20">send message</span></h5>
					<div id="success"></div>
					<form novalidate class="el-form-2" id="">
						<div class="row">
							<div class="col-sm-6 top20">
								<input id="user-name" class="border1 borderddd form-1-style2 border1 b-radius3" required="required" placeholder="Full Name *" />
							</div>
							<div class="col-sm-6 top20">
								<input id="user-email" class="border1 borderddd form-1-style2 border1 b-radius3" required="required" placeholder="Email Address *" />
							</div>
							<div class="col-sm-12 top20">
								<input id="user-website" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Website" />
							</div>
							<div class="col-sm-12 top20">
								<input id="user-subject" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Subject" />
							</div>
							<div class="col-sm-12 top20">
								<textarea id="user-message" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Comment *" required="required"></textarea>
								<input type="submit" value="SUBMIT" class="submit-btn button1-1 b-radius3 right30 button-orange top20">
							</div>
						</div>
						
					</form>
				</div>

				<div class="col-md-6">
					<h5 class="color333"><span class="extrabold uppercase bgfff p-right20">Some text/image content will go here</span></h5>
				</div>
				
				</div>
			</div>
		</div>
	<br />
@stop