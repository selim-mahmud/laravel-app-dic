@extends('layouts.control')

@section('meta')
	<title>Australian Driving Instructors Directory</title>
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
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="panel-title">School details</span>
				</div>
				<div class="panel-body">
					<table id="user" class="table table-bordered table-striped" style="clear: both">
						<tbody>
						<tr>
							<td style="width: 35%;">
								Profile photo
								<span class="fa fa-question-circle tooltip-icon" data-toggle="tooltip" data-placement="top"
									  title="This could be your school logo or your own photo or any thing related."></span>
							</td>
							<td style="width: 65%;">
								@if(Auth::user()->school->profile_photo_url)
									<img height="70" width="80" src="{{asset(Auth::user()->school->profile_photo_url)}}" alt="profile photo" />
								@else
									<img height="80" width="80" src="{{asset(config('dic.default_learner_profile_photo'))}}" alt="profile photo" />
								@endif
								&nbsp; &nbsp; <a href="#photo-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a>
								<span class="text-danger">{{$errors->first('photo')}}</span>
							</td>
						</tr>
						<tr>
							<td>Your name</td>
							<td>
								{{Auth::user()->name}} &nbsp; &nbsp;
								<a href="#name-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
								<span class="text-danger">{{$errors->first('name')}}</span>
							</td>
						</tr>

						<tr>
							<td>Email</td><td>
								{{Auth::user()->email}}
								&nbsp; &nbsp; <a href="#email-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
								<span class="text-danger">{{$errors->first('email')}}</span>
							</td>
						</tr>
						@if(Auth::user()->facebook_id === 0)
							<tr>
								<td>Password</td>
								<td>
									***************
									&nbsp; &nbsp; <a href="#password-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
									<span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span><br />
									<span class="text-danger">{{$errors->first('confirm_password')}}</span>
								</td>
							</tr>
							<tr>
								<td>School name</td><td>
									{{Auth::user()->school->name}}
								&nbsp; &nbsp; <a href="#school-name-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
									<span class="text-danger">{{$errors->first('school_name')}}</span>
								</td>
							</tr>
							<tr>
								<td>Short description</td><td>
									{{Auth::user()->school->short_desc != ''?Auth::user()->school->short_desc:'No description set yet.'}}
								&nbsp; &nbsp; <a href="#school-short-desc-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
									<span class="text-danger">{{$errors->first('short_desc')}}</span>
								</td>
							</tr>
							<tr>
								<td>Long description</td><td>
									{{Auth::user()->school->long_desc != ''?Auth::user()->school->long_desc:'No description set yet.'}}
									&nbsp; &nbsp; <a href="#school-long-desc-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
									<span class="text-danger">{{$errors->first('long_desc')}}</span>
								</td>
							</tr>
							<tr>
								<td>School website</td><td>
									{{Auth::user()->school->website != ''?Auth::user()->school->website:'No website link set yet.'}}
								&nbsp; &nbsp; <a href="#school-website-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
									<span class="text-danger">{{$errors->first('website')}}</span>
								</td>
							</tr>
							<tr>
								<td>School facebook</td><td>
									{{Auth::user()->school->facebook != ''?Auth::user()->school->facebook:'No facebook link set yet.'}}
								&nbsp; &nbsp; <a href="#school-facebook-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
									<span class="text-danger">{{$errors->first('facebook')}}</span>
								</td>
							</tr>
							<tr>
								<td>School twitter</td><td>
									{{Auth::user()->school->twitter != ''?Auth::user()->school->twitter:'No twitter link set yet.'}}
								&nbsp; &nbsp; <a href="#school-twitter-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
									<span class="text-danger">{{$errors->first('twitter')}}</span>
								</td>
							</tr>
						@endif
						</tbody>
					</table>

					<div id="photo-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Upload new photo</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangePhoto', 'files' => true]) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label class="field prepend-icon file file-fw">
											<span class="button btn-info">Choose File</span>
											<input class="gui-file" name="photo" id="photo" onchange="document.getElementById('uploader').value = this.value;" type="file">
											<input class="gui-input" id="uploader" placeholder="File Select" type="text">
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					<div id="name-form" class="popup-basic allcp-form mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change your name</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangeName']) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label for="name" class="field">
											{!! Form::text('name', null, ['class'=>'gui-input', 'placeholder'=>'Enter your name']) !!}
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					<div id="school-name-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change your school name</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postchangeSchoolName']) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label for="school_name" class="field">
											{!! Form::text('school_name', null, ['class'=>'gui-input', 'placeholder'=>'Enter your school name']) !!}
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					<div id="email-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change your email</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangeEmail']) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label for="email" class="field">
											{!! Form::text('email', null, ['class'=>'gui-input', 'placeholder'=>'Enter your email']) !!}
											<b class="tooltip tip-right-top"><em>This means your login email will be changed too.</em></b>
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					@if(Auth::user()->facebook_id === 0)
						<div id="password-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
							<div class="panel">
								<div class="panel-heading"><span class="panel-title">Change your password</span></div>
								{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangePassword']) !!}
								<div class="panel-body ph15">
									<div class="section row mhn10">
										<div class="col-md-12 ph15">
											<label for="password" class="field">
												{!! Form::password('password', ['class'=>'gui-input', 'placeholder'=>'Enter password']) !!}
											</label>
										</div>
									</div>
									<div class="section row mhn10">
										<div class="col-md-12 ph15">
											<label for="confirm_password" class="field">
												{!! Form::password('confirm_password', ['class'=>'gui-input', 'placeholder'=>'Confirm password']) !!}
											</label>
										</div>
									</div>
									<div class="section row mhn10">
										<div class="col-md-12 ph15">
											<button type="submit" class="button btn-primary">Change</button>
										</div>
									</div>
								</div>
								<div class="panel-footer"></div>
								{!! Form::close() !!}
							</div>
						</div>
					@endif
					<div id="school-short-desc-form" class="popup-basic allcp-form mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change short description</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangeShortDescription']) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label for="name" class="field">
											{!! Form::text('short_desc', null, ['class'=>'gui-input', 'placeholder'=>'Enter short description']) !!}
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					<div id="school-long-desc-form" class="popup-basic allcp-form mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change long description</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangeLongDescription']) !!}
							<div class="panel-body">
								<div class="section row">
									<div class="col-md-12">
										<label for="name" class="field">
											{!! Form::textarea('long_desc', null, ['class'=>'gui-input', 'rows'=>'6', 'placeholder'=>'Enter long description']) !!}
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					<div id="school-website-form" class="popup-basic allcp-form mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change website url</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangeWebsite']) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label for="name" class="field">
											{!! Form::text('website', null, ['class'=>'gui-input', 'placeholder'=>'Enter website url']) !!}
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					<div id="school-facebook-form" class="popup-basic allcp-form mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change facebook url</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangeFacebook']) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label for="name" class="field">
											{!! Form::text('facebook', null, ['class'=>'gui-input', 'placeholder'=>'Enter facebook url']) !!}
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
					<div id="school-twitter-form" class="popup-basic allcp-form mfp-hide">
						<div class="panel">
							<div class="panel-heading"><span class="panel-title">Change facebook url</span></div>
							{!! Form::open (['method'=>'POST', 'action'=> 'SchoolProfileController@postChangeTwitter']) !!}
							<div class="panel-body ph15">
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<label for="name" class="field">
											{!! Form::text('twitter', null, ['class'=>'gui-input', 'placeholder'=>'Enter twitter url']) !!}
										</label>
									</div>
								</div>
								<div class="section row mhn10">
									<div class="col-md-12 ph15">
										<button type="submit" class="button btn-primary">Change</button>
									</div>
								</div>
							</div>
							<div class="panel-footer"></div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@push('scripts_stack')

@endpush