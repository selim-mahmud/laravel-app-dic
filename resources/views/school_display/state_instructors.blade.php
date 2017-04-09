@extends('layouts.main')

@section('meta')
	<title>Australian Driving Instructors Directory for {{$state->name}}</title>
	<meta name="description" content="find driving instructors or driving schools in {{$state->name}}.
	Search for an instructor near your suburb">
	<meta name="keywords" content="Driving instructors or schools in {{$state->name}},Australian driving instructors, australian driving schools">
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
	{!! getRatingSchemaCodeInJson(4.85, 320) !!}
	<br />

	<!-- ========= search bar ========== -->
	<div class="search_bar">
		<div class="home-2-filter container pl-15 pr-15">
			<div class="row">
				<div class="col-md-12">
					<div class="home-reservation">
						@include('_partials.search_form')
					</div>
				</div>

			</div>
		</div>
	</div>
	@php
		use App\Helpers\Dic as Dic;
	@endphp

	<div class="top60 listing-details-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="about-title extrabold uppercase color333 width100"><span class="bgfff">Driving Instructors - {{$state->name}}</span></h1>
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
													<a href="{{url('driving-schools/'.strtolower(str_replace(' ', '-', $school->name)))}}">
														<img class="img-responsive" src="{{$school->profile_photo_url?asset($school->profile_photo_url):asset(config('dic.default_learner_profile_photo'))}}" alt="{{$school->name}}" class="b-radius3">
													</a>
													<div style="padding:10px;">
														<div class="{{$school->id}}"></div>
														<p style="margin-top:-10px" class="font12">{{Dic::getReviewStat($school->id)['average']}} based on {{Dic::getReviewStat($school->id)['count']}} reviews</p>
													</div>
												</div>
											</div>
											<div class="col-sm-9 bs-item-txt p-left10 p-right0">
												<div class="font14 color333 uppercase l-h-14 top10">
													<h3><a href="{{url('driving-schools/'.strtolower(str_replace(' ', '-', $school->name)))}}">{{$school->name}}</a></h3>
												</div>
												<div class="row">
													<div class="col-md-8">
														<div class="font14 color777">
													<span class="p-right20">
														{{!$school->contacts->isEmpty()?$school->contacts[0]->address:'No address has been set.'}}
													</span>
														</div>
														<div class="font14 color777"><span class="wordwrap font14 color777">
														<i class="fa fa-phone orange"></i>
														<b>{{!$school->contacts->isEmpty()?$school->contacts[0]->phone:'Not set yet'}}</b>
													</span></div>
														<div class="font14 color777"><span class="wordwrap font12 color777">
														<i class="fa fa-envelope orange"></i>
														<b>{{!$school->contacts->isEmpty()?$school->contacts[0]->email:'Not set yet'}}</b></span>
														</div>
														<div class="font14 color777">
													<span class="wordwrap font14 color777">
														<i class="fa fa-laptop orange"></i>
														@if($school->website)
															<a href="{{$school->website}}">{{$school->website}}</a>
														@else
															Not set yet
														@endif
													</span>
														</div>
														<div class="font14 color777">
													<span class="wordwrap font14 color777">
														<i class="fa fa-facebook orange"></i>
														@if($school->facebook)
															<a href="{{$school->facebook}}">{{$school->facebook}}</a>
														@else
															Not set yet
														@endif
													</span>
														</div>
														<div class="font14 color777">
													<span class="wordwrap font14 color777">
														<i class="fa fa-twitter orange"></i>
														@if($school->twitter)
															<a href="{{$school->twitter}}">{{$school->twitter}}</a>
														@else
															Not set yet
														@endif
													</span>
														</div>
													</div>
													<div class="col-md-4">
														<a style="margin-top:10px" href="{{url('driving-schools/'.strtolower(str_replace(' ', '-', $school->name)))}}" class="submit-btn button1-1 b-radius3 button-orange">View details</a>
													</div>
												</div>

												<h5>{{$school->short_desc}}</h5>
												<p>{{str_limit($school->long_desc, 150)}}</p>
												<div class="top15"></div>
											</div>
											<div class="clearfix"></div>
										</div>
									@endforeach
								@else
									<div>
										<h3>No driving school found in our directory for {{$state->name}}.
										We are in process of building our database. Please come back again
										to find any instructors in your area.</h3>
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
	@include('_partials.footer')
@stop

@push('scripts_stack')
<script>
    $(document).ready(function(){
		@foreach($schools as $school)
			$(".{{$school->id}}").starRating({
				readOnly: true,
				initialRating: {{Dic::getReviewStat($school->id)['average']}},
				starSize: 25,
				activeColor: 'orangered',
				useGradient: false
			});
		@endforeach
    });

</script>
@endpush