<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
		<meta charset="utf-8">

		@yield('meta')

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="{{asset('img/theme/fav.png')}}" />

		{{ Html::style('css/master.css') }}
		{{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}
		{{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css') }}
		{{ Html::style('css/color.css') }}
		{{ Html::style('css/custom.css') }}

		<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body ng-app="myApp">

		<header>

			<!-- ========= start of top header ========== -->
			<div class="h-first-row">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h1 style="font-size: 14px; font-weight: 600; margin:10px 0 0 0" class="text-uppercase hidden-xs">Welcome
								@if(Auth::check())
									<u><b> {{Auth::user()->display_name}} </b></u>
								@endif
								 to Driving Instructors Catalog</h1>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="h-login">
 								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">

									@if(Auth::check())
										<a href="{{url('logout')}}" class="btn btn-default dropdown-toggle"><i style="margin-right:5px; font-size: 15px;" class="fa fa-sign-out primary_color" aria-hidden="true"></i>Logout</a>
									@else
										<a href="{{url('login')}}" class="btn btn-default dropdown-toggle"><i style="margin-right:5px; font-size: 15px;" class="fa fa-sign-in primary_color" aria-hidden="true"></i>Login</a>
									@endif
										
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6">
										<div class="dropdown">
											@if(Auth::check())
												<button class="btn btn-default dropdown-toggle" type="button" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												  	<i style="margin-right:5px; font-size: 15px;" class="fa fa-user primary_color" aria-hidden="true"></i>Profile<i class="fa fa-angle-down"></i>
												  </button>
												  <ul style="margin-left: -120px;" class="dropdown-menu top_dropdown_menu" aria-labelledby="profile">
												  @if(App\User::isAuthManager())
												  	<li><a href="/manager"><span class="glyphicon glyphicon-chevron-right primary_color"></span> Dashboard</a></li>
												    <li><a href="/manager"><span class="glyphicon glyphicon-chevron-right primary_color"></span> View profile</a></li>
													<li><a href="/manager"><span class="glyphicon glyphicon-chevron-right primary_color"></span> Edit profile</a></li>
													@endif
													@if(App\User::isAuthInstructor())
														<li><a href="/instructor"><span class="glyphicon glyphicon-chevron-right primary_color"></span> View profile</a></li>
													<li><a href="/instructor"><span class="glyphicon glyphicon-chevron-right primary_color"></span> Edit profile</a></li>
													@endif
													@if(App\User::isAuthLearner())
													<li><a href="/manager"><span class="glyphicon glyphicon-chevron-right primary_color"></span> Dashboard</a></li>
													<li><a href="{{url('learner-profile')}}"><span class="glyphicon glyphicon-chevron-right primary_color"></span> View profile</a></li>
													<li><a href="/learner"><span class="glyphicon glyphicon-chevron-right primary_color"></span> Edit profile</a></li>
													@endif
												  </ul>
											@else
												 <button class="btn btn-default dropdown-toggle" type="button" id="register" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												  	<i style="margin-right:5px; font-size: 15px;" class="fa fa-user primary_color" aria-hidden="true"></i>Register<i class="fa fa-angle-down"></i>
												  </button>
												  <ul style="margin-left: -108px;" class="dropdown-menu top_dropdown_menu" aria-labelledby="register">
												    <li><a href="{{url('register-as-school/create')}}"><span class="glyphicon glyphicon-chevron-right primary_color"></span> Register your School</a></li>
													<li><a href="{{url('register-as-learner')}}"><span class="glyphicon glyphicon-chevron-right primary_color"></span> Register as a Learner</a></li>
												  </ul>
											@endif
										 
										</div>
									</div>
								</div>

							</div>	
					  
						</div>
					</div><!-- end of row -->
				</div><!-- end of .container -->
			</div><!-- end of .h-first-row -->
			<!-- ========= end of top header ========== -->
			
			<!-- ========= start of bottom header ========== -->
			<div id="header" class="h-second-row">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-10 h-logo">
							<div class="logotype">
								<a href="/"><img src="{{asset('img/theme/dic_logo.png')}}" alt="Logo"></a>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-2 h-menu">
							<nav>

								<div class="mobileMenuNav mobileMenuSwitcher onlyMobileMenu">
									<i class="fa fa-bars"></i>
								</div>
								
								<div class="nav-container container-fluid padding0">
									<div class="close-menu mobileMenuSwitcher onlyMobileMenu">
										<i class="fa fa-times"></i>
									</div>
									
									<ul class="nav navbar-nav navbar-main navbar-right">
										<li><a href="/">Home</a></li>
										<li class="dropdown">
											<a href="03-category-1.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Driving Instructors <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu">
												<li><a href="03-category-1.html">Instructors in Sydney</a></li>
												<li><a href="04-category-2.html">Instructors in Melbourne</a></li>
												<li><a href="05-category-3.html">Instructors in Brisbane</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="03-category-1.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">How it works <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu">
												<li><a href="/">For learners</a></li>
												<li><a href="/">For instructors</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="03-category-1.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Content Pages <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu">
												<li><a href="03-category-1.html">Content Pages 1</a></li>
												<li><a href="04-category-2.html">Content Pages 2</a></li>
												<li><a href="05-category-3.html">Content Pages 3</a></li>
											</ul>
										</li>
										<li><a href="/">Blog</a></li>
										<li><a href="/">About</a></li>
										<li><a href="/">Contact</a></li>
									</ul>
								</div>
							</nav>
						</div>
					</div><!-- end of .row -->
				</div><!-- end of .container -->
			</div><!-- end of .h-second-row -->
		</header><!-- end of header -->	
			<!-- ========= end of bottom header ========== -->

	<section>

		@yield('breadcrum')

		<br />
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="flash-message">
					    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has('alert-' . $msg))
					      	<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					      @endif
					    @endforeach
					</div> <!-- end .flash-message -->
				</div>
			</div>
		</div>

		@yield('content')

	</section>


		<footer>
			<div class="container-fluid">
				<div class="row f-first-row newsletter" style="margin-top: 0px!important;">
					<div style="text-align: center;" class="col-sm-6 f-newsletter-l">
						<h3><b class="colorfff uppercase">Newsletter signup</b></h3>
						Get registered for monthly newsletter to updates
					</div>
					<div class="col-sm-6 newsletter-bg padding0">
						<div class="newsletter-input">
							<input class="newsletter-inpup-field width100">
							<input type="submit" value="SIGNUP" class="newsletter-signup f-right">
						</div>
					</div>
				</div>
				<div class="row f-second-row footer">
					<div class="m1170">
						<div class="col-sm-4 f-1td top40">
							<h5 class="uppercase colorfff footer-title"><b class="footer-title">About Us</b></h5>
							<div class="footer-logo top30"><div class="no-wrap"><a class="footerLogo" href="/"><img src="{{asset('img/theme/dic_logo.png')}}" alt="Logo"></a></div></div>
							<div class="footer-td1-txt coloraaa top30 p-right20">
								Integer ac lorem sit amet est rhoncus dapi bus don cad
								pede acus morbi elit nunc molestie at ultrices eu eleifen
								lorem ut dictum erat masa. Nullam tempus erat id tort
								In hac habitasse platea dictumst.
							</div>
							<div class="button1-1 b-radius3 right30 button-blue top20">Read More</div>
							<div class="clearfix"></div>
						</div>

						<div class="col-sm-4 f-2td top40" >
							<h5 class="uppercase colorfff"><b class="footer-title">important links</b></h5>
							<ul class="list-styles left-40 top30 f-left coloraaa footer-list p-right20">
								<li><a href="#"><i class="fa fa-chevron-right"></i>Automotive</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i>Humanities</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i>Computers</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i>Education</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i>Health / Fitness</a></li>
							</ul>
							<ul class="list-styles left-40 top30 f-left">
								<li><a href="#"><i class="fa fa-chevron-right"></i>Internet Services</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i>Marketing</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i>Technology</a></li>
								<li><a href="{{url('admin_page')}}"><i class="fa fa-chevron-right"></i>Admin Page</a></li>
							</ul>
							<div class="clearfix"></div>
						</div>

						<div class="col-sm-4 f-3td top40" >
							<h5 class="uppercase colorfff"><b class="footer-title">GET IN TOUCH</b></h5>
							<div class="top30 p-right20 coloraaa">

								<form novalidate class="el-form-2" id="">
									<div class="row">
										<div class="col-sm-12 top10">
											<input id="user-name" class="border1 borderddd form-1-style2 border1 b-radius3" required="required" placeholder="Full Name *" />
										</div>
										<div class="col-sm-12 top10">
											<input id="user-email" class="border1 borderddd form-1-style2 border1 b-radius3" required="required" placeholder="Email Address *" />
										</div>
										<div class="col-sm-12 top10">
											<input id="user-website" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Website" />
										</div>
										<div class="col-sm-12 top10">
											<input id="user-subject" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Subject" />
										</div>
										<div class="col-sm-12 top10">
											<textarea id="user-message" class="border1 borderddd form-1-style2 border1 b-radius3" placeholder="Comment *" required="required"></textarea>
											<input type="submit" value="SUBMIT" class="submit-btn button1-1 b-radius3 right30 button-orange top10">
										</div>
									</div>
									
								</form>
		
							</div>
						</div>
					</div>
				</div>

				<div class="row f-third-row footer2">
					<div class="m1170">
						<div class="footer-relative">
							<div class="col-sm-6 left-footer2">
								&copy; {{date("Y")}} Driving Instructors Catalog - All Rights Reserved. <a href="#">Privacy Policy </a>
							</div>
							<div class="col-sm-6 right-footer2">
								<a href="#">
									<div class="img-icons-2"><i class="fa fa-facebook">&nbsp;</i></div>
								</a>
								<a href="#">
									<div class="img-icons-2"><i class="fa fa-google-plus">&nbsp;</i></div>
								</a>
								<a href="#">
									<div class="img-icons-2"><i class="fa fa-twitter">&nbsp;</i></div>
								</a>
								<a href="#">
									<div class="img-icons-2"><i class="fa fa-linkedin">&nbsp;</i></div>
								</a>
								<a href="#">
									<div class="img-icons-2"><i class="fa fa-rss">&nbsp;</i></div>
								</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<a id="to-top" href="#header-top"><i class="fa fa-chevron-up"></i></a>
		</footer>

		<!--Main-->
		{{ Html::script('js/jquery-1.11.3.min.js') }}
		{{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}   
		{{ Html::script('js/modernizr.custom.js') }}
		{{ Html::script('js/classie.js') }}
		{{ Html::script('js/datepicker.js') }}
		{{ Html::script('js/chosen.jquery.min.js') }}
		{{ Html::script('js/bootstrap-slider.js') }}
		{{ Html::script('js/bootstrap-datepicker.js') }}
		{{ Html::script('js/jquery.smooth-scroll.js') }}
		{{ Html::script('js/wow.min.js') }}
		{{ Html::script('js/jquery.placeholder.min.js') }}
		{{ Html::script('js/theme.js') }}

		<!-- load angular js -->
		{{ Html::script('//code.angularjs.org/1.4.0-rc.2/angular.min.js') }}
		{{ Html::script('//code.angularjs.org/1.4.0-rc.2/angular-messages.min.js') }}
		{{ Html::script('js/angular/app.js') }}
		
	</body>
</html>