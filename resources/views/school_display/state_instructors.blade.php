@extends('layouts.main')

@section('meta')
	<title>Australian Driving Instructors Directory</title>
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@section('header')
	@include('_partials.header')
@stop

@section('breadcrumb')
	@include('_partials.breadcrumb')
@stop

@section('flash_message')
	@include('_partials.flash_message')
@stop
@section('content')

	<br />

	<!-- ========= search bar ========== -->
	<div class="search_bar">
		<div class="home-2-filter container pl-15 pr-15">
			<div class="row">
				<div class="col-md-12">
					<div class="home-reservation">
						<div class="reservation-dropdowns">
							<div class="col-sm-3 p-left0 p-right0">
								<div class="btn-group width100">
									<input class="dropdown-btn-list dropdown-btn1 dropdown-btn1-1 btn btn-lg dropdown-toggle" type="text" placeholder="keywords" onclick="this.focus()">
								</div>
							</div>
							<div class="col-sm-2 p-left0 p-right0">
								<div class="btn-group width100">
									<div class="custom-select select-type4 high location">
										<select class="chosen-select">
											<option value="1">- Choose State -</option>
											<option value="2">USA</option>
											<option value="3">Ukraine</option>
											<option value="4">France</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-2 p-left0 p-right0">
								<div class="btn-group width100">
									<div class="custom-select select-type4 high location">
										<select class="chosen-select">
											<option value="1">- Choose City -</option>
											<option value="2">USA</option>
											<option value="3">Ukraine</option>
											<option value="4">France</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-2 p-left0 p-right0">
								<div class="btn-group width100">
									<div class="custom-select select-type4 high location">
										<select class="chosen-select">
											<option value="1">- Choose Suburb -</option>
											<option value="2">USA</option>
											<option value="3">Ukraine</option>
											<option value="4">France</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-3 p-left0 p-right0">
								<div class="btn-group width100">
									<a href="#"><div class="find-btn">Search</div></a>
								</div>
							</div><div class="clearfix"></div>
						</div>
					</div>
					
				</div>
			</div>				
			
		</div>
	</div>	

	<div class="top60 listing-details-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about-title extrabold uppercase color333 width100">
						<span class="bgfff">Driving Instructors - {{$state->name}}</span>
					</div>
					<div class="row">

						<div class="col-md-3 listing-details-left top60">
							@include('_partials.state_links')
						</div>

						<div class="col-md-9 listing-details-right top40">
						<div class="results-container">
							<div class="top20">
								@if(!$schools->isEmpty())
									@foreach($schools as $school)
										<div class="bs-element-container">
											<div class="col-sm-3 bs-photo p-left0">
												<div class="bs-photo-container memb-photo memb-photo1">
													<a href="{{url('driving-schools/'.str_slug($school->name))}}"><img src="{{$school->profile_photo_url?asset($school->profile_photo_url):asset(config('dic.default_learner_profile_photo'))}}" alt="{{$school->name}}" class="bs-photo-img img-thumbnail"></a>
												</div>
											</div>
											<div class="col-sm-9 bs-item-txt p-left10 p-right0">
												<div class="font14 color333 uppercase l-h-14 top10"><b> <a href="{{url('driving-schools/'.str_slug($school->name))}}">{{$school->name}}</a></b></div>
												<div class="font12 color777"><span class="p-right20">
														{{$school->contacts[0]->address?$school->contacts[0]->address:'No address has been set.'}}
													</span>
												</div>
												<div class="font12 color777"><span class="wordwrap font12 color777">
														<i class="fa fa-phone orange"></i>
														<b>{{$school->contacts[0]->phone?$school->contacts[0]->phone:'Not set yet'}}</b>
													</span></div>
												<div class="font12 color777"><span class="wordwrap font12 color777">
														<i class="fa fa-envelope orange"></i>
														<b>{{$school->contacts[0]->email?$school->contacts[0]->email:'Not set yet'}}</b></span>
												</div>
												<div class="font12 color777">
													<span class="wordwrap font12 color777">
														<i class="fa fa-cloud orange"></i>
														@if($school->website)
															<a href="{{$school->website}}">{{$school->website}}</a>
														@else
															Not set yet
														@endif
													</span>
												</div>
												<div class="font12 color777">
													<span class="wordwrap font12 color777">
														<i class="fa fa-facebook orange"></i>
														@if($school->facebook)
															<a href="{{$school->facebook}}">{{$school->facebook}}</a>
														@else
															Not set yet
														@endif
													</span>
												</div>
												<div class="font12 color777">
													<span class="wordwrap font12 color777">
														<i class="fa fa-twitter orange"></i>
														@if($school->twitter)
															<a href="{{$school->twitter}}">{{$school->twitter}}</a>
														@else
															Not set yet
														@endif
													</span>
												</div>
												<div class="top15"><b>{{$school->short_desc}}</b></div>
												<div>{{str_limit($school->long_desc, 150)}}</div>
												<div class="top15"></div>
											</div>
											<div class="clearfix"></div>
										</div>
									@endforeach
								@else
									<div>
										<p>No driving school found in our directory for {{$state->name}}.
										We are in process of building our database. Please come back again
										to find any instructors in your area.</p>
									</div>
								@endif
							</div>
							{{ $schools->links() }}
						</div>
					</div>
						
					</div>
					
				</div>

			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
@stop
@section('footer')
	@include('_partials.footer');
@stop

@push('scripts_stack')

@endpush