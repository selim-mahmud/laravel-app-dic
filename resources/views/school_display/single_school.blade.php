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

@php
	use App\Helpers\Dic as Dic;
@endphp

@section('content')
	<br />
	<div class="listing-details-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="list-det-left pad25 bg_blue">
						<div class="row">
							<div class="col-md-3">
								<div class="list-det-ico">
									<img style="margin-top:-10px" src="{{$school->profile_photo_url?asset($school->profile_photo_url):asset(config('dic.default_learner_profile_photo'))}}" alt="{{$school->name}}" class="b-radius3">
									<div class="clearfix"></div><br />
								</div>
							</div>
							<div class="col-md-9">
								<h1 class="list-det-title colorfff uppercase">
									{{$school->name}}
								</h1>
								<div style="margin-top:-10px; margin-bottom: 10px">
									<div style="float:left; margin-right: 10px;" class="{{$school->id}}"></div>
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
				<div class="col-sm-3 listing-details-left">
					<div class="calendar">
						<div class="right-title uppercase"><i class="fa fa-calendar">&nbsp;</i>calendar</div>
						<div class="cal-container">
							<div class="hero-unit">
								<div class="date"  ></div>
							</div>
						</div>
						<div class="select-time top40 uppercase">select your time</div>
						<div class="select-time-list">
							<a href="#"><div class="width50 f-left text-right">10:00 AM</div></a>
							<a href="#"><div class="width50 f-left">11:00 PM</div></a>
							<a href="#"><div class="width50 f-left text-right">12:00 PM</div></a>
							<a href="#"><div class="width50 f-left">1:00 PM</div></a>
							<a href="#"><div class="width50 f-left text-right">2:00 PM</div></a>
							<a href="#"><div class="width50 f-left">3:00 PM</div></a>
							<a href="#"><div class="width50 f-left text-right">4:00 PM</div></a>
							<a href="#"><div class="width50 f-left">5:00 PM</div></a>
							<a href="#"><div class="width50 f-left text-right">6:00 PM</div></a>
							<a href="#"><div class="width50 f-left">7:00 PM</div></a>
							<a href="#"><div class="width50 f-left text-right">8:00 PM</div></a>
							<a href="#"><div class="width50 f-left">9:00 PM</div></a>
							<a href="#"><div class="width50 f-left text-right">10:00 PM</div></a>
							<a href="#"><div class="width50 f-left">11:00 AM</div></a>
							<div class="clearfix"></div>
						</div>
						<div class="total-cost semibold color333">Total Cost: <b class="p-left10">$50.00</b></div>
					</div>	

				</div>

				<div class="col-sm-9 listing-details-right add_margin">
					<article>
						<div class="about-title extrabold uppercase color333">
							<span class="bgfff">About restaurant</span>
						</div>
						<div class="font14 color333 uppercase top20">
							<b>
								Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt labore
								dolore magna aliqua enim.
							</b>
						</div>
						<div class="top20">
							Eiusmod tempor incidiunt labore velit dolore magna aliqu sed enimi nim veniam quis nostraud exercition eullamco laboris orem ipsu
							dolor sit amet, consectetur adipisicing elit sed eiusmod tempor incididunt ut labore etu dolore magna aliqua. Ut enim ad minim venia
							quis nostrud exercitation ullamco laboris nisi ut aliquip commod. Sed lorem ipsum dolor sit amet consectetur adipisicing elit sed do
							eiusmod tempor incididunt ut labore et dolore magna aliqua. 
						</div>
						<div class="clearfix"></div>
					</article>
					<article class="list-service-area">
						<div class="about-title extrabold uppercase color333 top60">
							<span class="bgfff">Servicing Suburbs</span>
						</div>

							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="nav-right-menu">
										<ul class="start0 list-style top-menu">
											<li class="menu-link">Keswick</li>
											<li class="menu-link">Elizabeth</li>
											<li class="menu-link">Elizabeth South</li>
										</ul>
									</div>
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="nav-right-menu">
										<ul class="start0 list-style top-menu">
											<li class="menu-link">Keswick</li>
											<li class="menu-link">Elizabeth</li>
											<li class="menu-link">Elizabeth South</li>
										</ul>
									</div>
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="nav-right-menu">
										<ul class="start0 list-style top-menu">
											<li class="menu-link">Keswick</li>
											<li class="menu-link">Elizabeth</li>
											<li class="menu-link">Elizabeth South</li>
										</ul>
									</div>
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<div class="nav-right-menu">
										<ul class="start0 list-style top-menu">
											<li class="menu-link">Keswick</li>
											<li class="menu-link">Elizabeth</li>
											<li class="menu-link">Elizabeth South</li>
										</ul>
									</div>
								</div>	
							</div>

						<div class="clearfix"></div>		
					</article>
					<article class="art-images-gallery ">
						<div class="about-title extrabold uppercase color333 top60">
							<span class="bgfff">Images gallery</span>
						</div>
						<div class="images-gallery valign-table top40">

							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
							    <div class="item active">
							      <img width="100%" src="{{asset('img/theme/gallery-big-1.jpg')}}" alt="...">
							    </div>
							    <div class="item">
							      <img width="100%" src="{{asset('img/theme/gallery-big-2.jpg')}}" alt="...">
							    </div>
							    <div class="item">
							      <img width="100%" src="{{asset('img/theme/gallery-big-3.jpg')}}" alt="...">
							    </div>
							  </div>

							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
						</div>
						<div class="clearfix"></div>
					</article>
					<article class="list-det-video">
						<div class="about-title extrabold uppercase color333 top60">
							<span class="bgfff">video</span>
						</div>
						<div class="top20">
							<div class="first-pict">
								<div class="row">
									<div class="col-md-4">
										<div class="embed-responsive embed-responsive-4by3">
										  <iframe width="420" height="315" src="https://www.youtube.com/embed/pZO8izHWWTE" frameborder="0" allowfullscreen></iframe>
										</div>
									</div>
									<div class="col-md-4">
										<div class="embed-responsive embed-responsive-4by3">
										  <iframe width="420" height="315" src="https://www.youtube.com/embed/pZO8izHWWTE" frameborder="0" allowfullscreen></iframe>
										</div>
									</div>
									<div class="col-md-4">
										<div class="embed-responsive embed-responsive-4by3">
										  <iframe width="420" height="315" src="https://www.youtube.com/embed/pZO8izHWWTE" frameborder="0" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>			
					</article>

					<div class="about-title extrabold uppercase color333 top60">
						<span class="bgfff">raiting & review</span>
					</div>	
					<div class="raiting-review top40">
						<div class="col-sm-7 padding0">
							<div class="valign-table r-review">
								<div class="valign-table-cell left-side col-sm-6 b-right-1 b-color-eee p-left30">
									<div class="font40 color333"><b>4.5</b></div><span class="font14 color777 uppercase"><b>Overall Rating</b></span>
								</div>
								<div class="valign-table-cell right-side col-sm-6 b-right-1 b-color-eee text-center">
									<ul class="list-styles raitings-stars padding0 inl-flex">
										<li>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</li>
									</ul><div class="clearfix"></div>
									<span class="font12 semibold color777">Based on recent 50 reviews</span>
								</div>
							</div>
						</div>
						<div class="col-sm-5 padding0">
							<div class="valign-table r-review font13 color777 lh-15-em padding20 wordwrap">
								<div class="valign-table-cell col-sm-6 left-side p-left0 p-right0">
									Food Quality<br />
									<b class="blue">4.2</b>
									<br /><br />
									Service Level<br />
									<b class="blue">4.0</b>
								</div>
								<div class="valign-table-cell col-sm-6 right-side p-left0 p-right0">
									Pricie Rating<br />
									<b class="blue">3.9</b>
									<br /><br />
									Value For Money<br />
									<b class="blue">4.5</b>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>			
					</div>
					<div class="raiting-review-sort top40">
						<div class="blog-det-comments">
							<div class="blog-det-comment top40">
								<table>
									<tr>
										<td>
											<div class="inline-block blog-comment-photo">
												<img src="{{asset('img/theme/blog-com1.jpg')}}" alt="wd">
											</div>
										</td>
										<td>
											<div class="inline-block">
												<div class="font14 color333 l-h-1em"><b>Christian Smith</b></div>
												<div class="comment-raiting font13 semibold color777">
													<div class="rait-numb font13 colorfff"><b>4.1</b></div>
													<div class="rait-serv">
														Service<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
													</div>
													<div class="rait-qual">
														Quality<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
													</div>
													<div class="rait-price">
														Pricing<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
													</div>
												</div>
												<div class="clearfix"></div>
												<div>Eiusmod tempor incidiunt labore velit dol emagna aliqu sedu enim nim veniam ut quis nostraud exercition 
													eulam laboris orem ipsu dolor sit amet dui consectetur adipisicing elit sed eiusmod.
												</div>
												<div class="font11 semibold color333 top10">Posted 2 days ago <a href="#">REPLY</a></div>
											</div>
										</td>
									</tr>
								</table>
							</div>
							<div class="blog-det-comment top40">
								<table>
									<tr>
										<td>
											<div class="inline-block blog-comment-photo">
												<img src="{{asset('img/theme/blog-com2.jpg')}}" alt="wd">
											</div>
										</td>
										<td>
											<div class="inline-block">
												<div class="font14 color333 l-h-1em"><b>Sam Anderson</b></div>
												<div class="comment-raiting font13 semibold color777">
													<div class="rait-numb font13 colorfff"><b>5.0</b></div>
													<div class="rait-serv">
														Service<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
													</div>
													<div class="rait-qual">
														Quality<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
													</div>
													<div class="rait-price">
														Pricing<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
													</div>
												</div>
												<div class="clearfix"></div>
												<div>Eiusmod tempor incidiunt labore velit dol emagna aliqu sedu enim nim veniam ut quis nostraud exercition 
													eulam laboris orem ipsu dolor sit amet dui consectetur adipisicing elit sed eiusmod.
												</div>
												<div class="font11 semibold color333 top10">Posted 2 days ago <a href="#">REPLY</a></div>
											</div>
										</td>
									</tr>
								</table>
							</div>
							<div class="blog-det-comment top40">
								<table>
									<tr>
										<td>
											<div class="inline-block blog-comment-photo">
												<img src="{{asset('img/theme/blog-com3.jpg')}}" alt="wd">
											</div>
										</td>
										<td>
											<div class="inline-block">
												<div class="font14 color333 l-h-1em"><b>Donald Michael</b></div>
												<div class="comment-raiting font13 semibold color777">
													<div class="rait-numb font13 colorfff"><b>4.8</b></div>
													<div class="rait-serv">
														Service<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
													</div>
													<div class="rait-qual">
														Quality<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
													</div>
													<div class="rait-price">
														Pricing<br />
														<ul class="list-styles raitings-stars inl-flex">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
													</div>
												</div>
												<div class="clearfix"></div>
												<div>Eiusmod tempor incidiunt labore velit dol emagna aliqu sedu enim nim veniam ut quis nostraud exercition 
													eulam laboris orem ipsu dolor sit amet dui consectetur adipisicing elit sed eiusmod.
												</div>
												<div class="font11 semibold color333 top10">Posted 2 days ago <a href="#">REPLY</a></div>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>


						<div class="about-title extrabold uppercase top40">
							<span class="bgfff font22 color333">write a comment</span>
						</div>

						<div class="write-comment-raiting font13 semibold color777">
							<div class="rait-serv">
								Service
								<ul class="list-styles raitings-stars inl-flex">
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
								</ul><div class="clearfix"></div>
							</div>
							<div class="rait-qual">
								Quality
								<ul class="list-styles raitings-stars inl-flex">
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
								</ul><div class="clearfix"></div>
							</div>
							<div class="rait-price">
								Pricing
								<ul class="list-styles raitings-stars inl-flex">
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
									<li onclick="location.href='';"><i class="fa fa-star-o"></i></li>
								</ul><div class="clearfix"></div>
							</div>
						</div>			

						<form class="el-form-2 f-left width100" id="el-form-1">
							<div class="col-sm-6 top20 p-left0"><input class="border1 borderddd form-1-style2 border1 b-radius3" onblur="" placeholder="Full Name *" /></div>
							<div class="col-sm-6 top20 p-right0"><input class="form-1-style2 border1 borderddd p-right0 b-radius3" placeholder="Email Address *" /></div>
							<div class="col-sm-12 top20 padding0"><input class="form-1-style2 border1 borderddd p-right0 b-radius3" placeholder="Website" /></div>
							<div class="col-sm-12 top20 padding0">
								<textarea class="form-1-style2 border1 borderddd p-right0 b-radius3" placeholder="Comment" ></textarea>
								<input type="submit" value="SUBMIT" class="submit-btn button1-1 b-radius3 right30 button-blue top20">
							</div>
						</form>				
						<div class="clearfix"></div>		
					</div>	
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
			<br />
@stop

@section('footer')
	@include('_partials.footer');
@stop

@push('scripts_stack')
<script>
    $(document).ready(function(){
		$(".{{$school->id}}").starRating({
            readOnly: true,
            initialRating: {{Dic::getReviewStat($school->id)['average']}},
            starSize: 25,
            activeColor: 'orangered',
            useGradient: false
        });
    });

</script>
@endpush