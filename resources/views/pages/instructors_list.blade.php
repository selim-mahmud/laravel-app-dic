
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
						<span class="bgfff">Driving Instructors</span>
					</div>
					<div class="row">

						<div class="col-md-3 listing-details-left top60">
							<nav style="margin-top:-10px;">
								<div class="left-1-menu nav-right-menu">
									<div id="MainMenu">
										<div class="list-group panel">
											<a href="#state-1" class="list-group-item-success" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" data-parent="#MainMenu">
												<ul class="top-10 start0 list-style top-menu"><li class="menu-link" tabindex="0">New South Wales<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></li></ul></a>
											<div class="clearfix"></div>
											<div class="collapse" id="state-1">
												<div class="business-services">
													<div class="business-services-menu margin0 start0">
														<a href="#city-1" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">NSW City 1 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-1">
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 3</a></p>
														</div>

														<a href="#city-2" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">NSW City 2 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-2">
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 3</a></p>
														</div>

														<a href="#city-3" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">NSW City 3 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-3">
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 3</a></p>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>	

											<a href="#state-2" class="list-group-item-success" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" data-parent="#MainMenu">
												<ul class="top-10 start0 list-style top-menu"><li class="menu-link" tabindex="0">Victoria<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></li></ul></a>
											<div class="clearfix"></div>
											<div class="collapse" id="state-2">
												<div class="business-services">
													<div class="business-services-menu margin0 start0">
														<a href="#city-4" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">Victoria City 1 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-4">
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 3</a></p>
														</div>

														<a href="#city-5" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">Victoria City 2 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-5">
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 3</a></p>
														</div>

														<a href="#city-6" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">Victoria City 3 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-6">
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 3</a></p>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>	

											<a href="#state-3" class="list-group-item-success" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" data-parent="#MainMenu">
												<ul class="top-10 start0 list-style top-menu"><li class="menu-link" tabindex="0">Queensland<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></li></ul></a>
											<div class="clearfix"></div>
											<div class="collapse" id="state-3">
												<div class="business-services">
													<div class="business-services-menu margin0 start0">
														<a href="#city-7" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">QLD City 1 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-7">
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 1 suburb 3</a></p>
														</div>

														<a href="#city-8" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">QLD City 2 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-8">
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 2 suburb 3</a></p>
														</div>

														<a href="#city-9" data-wow-delay="0.7s" data-wow-duration="1.5s" data-toggle="collapse" href="03-category-1.html"><ul class="top0"><li class="business-item">QLD City 3 <i style="margin-top:5px;" class="fa fa-angle-down pull-right"></i></li></ul></a>
														<div class="collapse suburb_level" id="city-9">
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 1</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 2</a></p>
															<p><a href=""><i class="fa fa-angle-right"></i>City 3 suburb 3</a></p>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>	


				
										</div>
										<div class="clearfix"></div>				
									</div>
								</div>
							</nav>
						</div>

						<div class="col-md-9 listing-details-right top60">
						<div class="sorts-by-results b-radius3 l-h-40 color777">
							<div class="col-sm-6 font13 semibold">
								Your search returned <span class="extrabold blue">37</span> results
							</div>
							<div class="col-sm-6">
								<div class="f-right p-relative wordwrap">
									<div style="font-size: 13px;" class="f-right font11 semibold dropdown-btn-list btn btn-lg dropdown-toggle uppercase" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Sort results By
										<i class="fa fa-angle-down"></i>
									</div>
									<div class="clearfix"></div>
									<ul class="dropdown-menu width100 uppercase">
										<li><a href="#">raiting</a></li>
										<li><a href="#">date</a></li>
										<li><a href="#">user</a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="results-container">
							<div class="top20">
								<div class="bs-element-container">
									<div class="col-sm-3 bs-photo p-left0">
										<div class="bs-photo-container memb-photo memb-photo1">
											<img src="{{asset('img/theme/bs-2.jpg')}}" alt="wd" class="bs-photo-img">
											<div class="memb-photo-hover memb-photo-hover1">
												<div class="memb-photo-links">
													<a href="#">
														<div class="img-icons"><i class="fa fa-heart-o">&nbsp;</i></div>
													</a>
													<a href="#">
														<div class="img-icons"><i class="fa fa-share-alt">&nbsp;</i></div>
													</a><br />
													<ul class="list-styles raitings-stars p-left10 inl-flex">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-o"></i></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-9 bs-item-txt p-left10 p-right0">
										<a href="#"><div class="font11 semibold blue uppercase">Category name</div></a>
										<div class="font14 color333 uppercase l-h-14 top10"><b>Ridenow sports</b></div>
										<div class="font12 color777"><span class="p-right20">17202 N Cave Creek Rd, Phoenix, AZ 85032</span><span class="wordwrap font12 color777"><i class="fa fa-phone orange">&nbsp;</i><b>(602) 910-6249</b></span></div>
										<div class="top15">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed veniam quis
											nostrud lorem ipsum dolor sit amet consectetur.
										</div>								
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="bs-element-container">
									<div class="col-sm-3 bs-photo p-left0">
										<div class="bs-photo-container memb-photo memb-photo1">
											<img src="{{asset('img/theme/bs-2.jpg')}}" alt="wd" class="bs-photo-img">
											<div class="memb-photo-hover memb-photo-hover1">
												<div class="memb-photo-links">
													<a href="#">
														<div class="img-icons"><i class="fa fa-heart-o">&nbsp;</i></div>
													</a>
													<a href="#">
														<div class="img-icons"><i class="fa fa-share-alt">&nbsp;</i></div>
													</a><br />
													<ul class="list-styles raitings-stars p-left10 inl-flex">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-o"></i></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-9 bs-item-txt p-left10 p-right0">
										<a href="#"><div class="font11 semibold blue uppercase">Category name</div></a>
										<div class="font14 color333 uppercase l-h-14 top10"><b>Amicus Hair and Beauty</b></div>
										<div class="font12 color777"><span class="p-right20">5108 Macarthur Blvd NW Unit B, Washington, DC 20016</span><span class="wordwrap font12 color777"><i class="fa fa-phone orange">&nbsp;</i><b>(602) 910-6249</b></span></div>
										<div class="top15">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed veniam quis
											nostrud lorem ipsum dolor sit amet consectetur.
										</div>								
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="bs-element-container">
									<div class="col-sm-3 bs-photo p-left0">
										<div class="bs-photo-container memb-photo memb-photo1">
											<img src="{{asset('img/theme/bs-2.jpg')}}" alt="wd" class="bs-photo-img">
											<div class="memb-photo-hover memb-photo-hover1">
												<div class="memb-photo-links">
													<a href="#">
														<div class="img-icons"><i class="fa fa-heart-o">&nbsp;</i></div>
													</a>
													<a href="#">
														<div class="img-icons"><i class="fa fa-share-alt">&nbsp;</i></div>
													</a><br />
													<ul class="list-styles raitings-stars p-left10 inl-flex">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-o"></i></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-9 bs-item-txt p-left10 p-right0">
										<a href="#"><div class="font11 semibold blue uppercase">Category name</div></a>
										<div class="font14 color333 uppercase l-h-14 top10"><b>Ridenow sports</b></div>
										<div class="font12 color777"><span class="p-right20">17202 N Cave Creek Rd, Phoenix, AZ 85032</span><span class="wordwrap font12 color777"><i class="fa fa-phone orange">&nbsp;</i><b>(602) 910-6249</b></span></div>
										<div class="top15">Eiusmod tempor incidiunt labore velit dolore magna aliqu sed veniam quis
											nostrud lorem ipsum dolor sit amet consectetur.
										</div>								
									</div>
									<div class="clearfix"></div>
								</div>
								
							</div>

						</div>
						<a href="03-category-1.html"><div class="blue-gradient-btn readmore-btn b-radius3 color777 top20 uppercase top60">load more</div></a>
					</div>
						
					</div>
					
				</div>

			</div>
		</div>
	</div>
	<br />
@stop