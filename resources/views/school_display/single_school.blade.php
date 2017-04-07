@extends('layouts.main')

@section('meta')
	<title>{{$school->name}} - Australian Driving Instructors Directory</title>
	<meta name="description" content="View profile of {{$school->name}}. Find {{$school->name}} service, service area or contact details">
	<meta name="keywords" content="{{$school->name}}, profile, service, contact details, driving lessons">
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

@php
	use App\Helpers\Dic as Dic;
@endphp

@section('content')
	{!! getRatingSchemaCodeInJson(4.60, 24) !!}
	<br />
	<div class="listing-details-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="list-det-left pad25 bg_blue">
						<div  style="margin-top: 30px;" class="row">
							<div class="col-md-3">
								<div class="list-det-ico">
									<img width="100%" style="margin-top:-10px" src="{{$school->profile_photo_url?asset($school->profile_photo_url):asset(config('dic.default_learner_profile_photo'))}}" alt="{{$school->name}}" class="b-radius3">
									<div class="clearfix"></div><br />
								</div>
							</div>
							<div class="col-md-9">
								<h1 class="list-det-title colorfff uppercase">{{$school->name}}</h1>
								<div style="margin-top:-10px; margin-bottom: 10px">
									<div style="float:left; margin-right: 10px;" class="overall_score"></div>
									<p style="float:left;" class="font12">{{Dic::getReviewStat($school->id)['average']}} based on {{Dic::getReviewStat($school->id)['count']}} reviews</p>
									<div class="clearfix"></div>
								</div>
								<div class="list-det-address"><i class="fa fa-map-marker"></i> {{$school->contacts[0]->address?$school->contacts[0]->address:'No address has been set.'}}</div>
								<div class="clearfix"></div>
								<div class="">							
									<div class="f-left p-right20">
										<ul class="list-styles new-first-det start0 f-left">
											<li><i class="fa fa-phone">&nbsp;</i><b>{{$school->contacts[0]->phone?$school->contacts[0]->phone:'Not set yet'}}</b></li>
											<li><i class="fa fa-envelope-o">&nbsp;</i><b>{{$school->contacts[0]->email?$school->contacts[0]->email:'Not set yet'}}</b></li>
										</ul></div>
									<div class="f-left">
										<ul class="list-styles new-first-det start0 f-left">
											@if($school->website)
												<li><a href="{{$school->website}}"><i class="fa fa-laptop"></i> Website</a></li>
											@endif
											@if($school->facebook)
												<li><a href="{{$school->facebook}}"><i class="fa fa-facebook"></i> Facebook</a></li>
											@endif

											@if($school->twitter)
												<li><a href="{{$school->twitter}}"><i class="fa fa-twitter"></i> Twitter</a></li>
											@endif
											<li><a href="#"><i class="fa fa-share-alt">&nbsp;</i>share</a></li>
										</ul>
									</div>
								</div><div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="listing-details-main top60">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 listing-details-right add_margin">
					<article>
						<div class="about-title extrabold uppercase color333">
							<span class="bgfff">About {{$school->name}}</span>
						</div>
						<h3 class="font14 color333 top20"><b>{{$school->short_desc}}</b></h3>
						<p class="top20">{{$school->long_desc}}</p>
						<div class="clearfix"></div>
					</article>
					<article class="list-service-area">
						<div class="about-title extrabold uppercase color333 top60">
							<span class="bgfff">Servicing Suburbs</span>
						</div>
							<div class="row">
								@if(!$school->serviceAreas->isEmpty())
									@foreach($school->serviceAreas as $serviceArea)
										<div class="col-md-3 col-sm-3 col-xs-6">
											<div class="nav-right-menu">
												<ul class="start0 list-style top-menu">
													<li style="text-align: center; padding-left: 0" class="menu-link">{{$serviceArea->postcode->suburb}}</li>
												</ul>
											</div>
										</div>
									@endforeach
								@else
									<h3>No service area has been set.</h3>
								@endif
							</div>
						<div class="clearfix"></div>
					</article>
					<article class="list-service-area">
						<div class="about-title extrabold uppercase color333 top60">
							<span class="bgfff">Available services</span>
						</div>
						<div class="row">
							@if(!$school->services->isEmpty())
								@foreach($school->services as $service)
									<div class="col-md-3 col-sm-3 col-xs-6">
										<div class="nav-right-menu">
											<ul class="start0 list-style top-menu">
												<li style="text-align: center; padding-left: 0" class="menu-link">{{$service->name}}</li>
											</ul>
										</div>
									</div>
								@endforeach
							@else
								<h3>No service has been set.</h3>
							@endif
						</div>
						<div class="clearfix"></div>
					</article>
					<article class="art-images-gallery ">
						<div class="about-title extrabold uppercase color333 top60">
							<span class="bgfff">Images gallery</span>
						</div>
						<div class="images-gallery valign-table top40">
							@if(!$school->services->isEmpty())
								<div id="school-photo-gallery" class="carousel slide" data-ride="carousel">
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
								  @foreach($school->medias as $key=>$media)
									  <div class="item {{$key===0?'active':''}}">
										  <img width="100%" src="{{asset($media->url)}}" alt="...">
									  </div>
								  @endforeach
							  </div>
							  <!-- Controls -->
							  <a class="left carousel-control" href="#school-photo-gallery" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#school-photo-gallery" role="button" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
							@else
								<h3>No image has been uploaded.</h3>
							@endif
						</div>
						<div class="clearfix"></div>
					</article>
					<div class="about-title extrabold uppercase color333 top60">
						<span class="bgfff">raiting & review</span>
					</div>	
					<div class="raiting-review top40">
						<div class="col-sm-7 padding0">
							<div class="valign-table r-review">
								<div class="valign-table-cell left-side col-sm-6 b-right-1 b-color-eee p-left30">
									<div class="font40 color333"><b>{{Dic::getReviewStat($school->id)['average']}}</b></div><span class="font14 color777 uppercase"><b>Overall Rating</b></span>
								</div>
								<div style="height: 123px;" class="valign-table-cell right-side col-sm-6 b-right-1 b-color-eee text-center">
									<div class="overall_score"></div>
									<div class="clearfix"></div>
									<span class="font12 semibold color777">Based on {{Dic::getReviewStat($school->id)['count']}} reviews</span>
								</div>
							</div>
						</div>
						<div class="col-sm-5 padding0">
							<div class="valign-table r-review font13 color777 lh-15-em padding20 wordwrap">
								<div class="valign-table-cell col-sm-6 left-side p-left0 p-right0">
									<div class="font40 color333"><b>{{Dic::getReviewStat($school->id)['count']}}</b></div><span class="font14 color777 uppercase"><b>total reviews</b></span>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>			
					</div>
					<div class="raiting-review-sort top40">
						<div class="blog-det-comments">
							@if(!$school->reviews->isEmpty())
								@foreach($school->reviews as $review)
									<div class="blog-det-comment top40">
										<table>
											<tr>
												<td>
													<div class="inline-block blog-comment-photo">
														<img width="100" src="{{$review->user->profile_photo_url?asset($review->user->profile_photo_url):asset(config('dic.default_learner_profile_photo'))}}" alt="{{asset($review->user->display_name)}}">
													</div>
												</td>
												<td>
													<div class="inline-block">
														<div class="font14 color333 l-h-1em"><b>{{$review->user->name}}</b></div>
														<div class="comment-raiting font13 semibold color777">
															<div class="rait-numb font13 colorfff"><b>{{$review->rating}}</b></div>
																<div style="margin-top: 10px;" class="{{$review->id}}"></div>
														</div>
														<div class="clearfix"></div>
														<div>{{$review->comment}}</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
								@endforeach
							@else
								<h3>No review found.</h3>
							@endif
						</div>
						<div class="clearfix"></div>
					</div>	
					<div class="clearfix"></div>
				</div>
				<div class="col-sm-3 listing-details-left">
					@include('_partials.state_links')
				</div>
			</div>
		</div>

	</div>
			<br />
@stop

@section('footer')
	@include('_partials.footer')
@stop

@push('scripts_stack')
<script>
    $(document).ready(function(){
		$(".overall_score").starRating({
            readOnly: true,
            initialRating: {{Dic::getReviewStat($school->id)['average']}},
            starSize: 25,
            activeColor: 'orangered',
            useGradient: false
        });
    });

    $(document).ready(function(){
        @foreach($school->reviews as $review)
            $(".{{$review->id}}").starRating({
            readOnly: true,
            initialRating: {{$review->rating}},
            starSize: 25,
            activeColor: 'orangered',
            useGradient: false
        });
		@endforeach
    });

</script>
@endpush