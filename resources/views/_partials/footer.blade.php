
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
								{!! Form::open(['method' => 'post', 'action' => 'PageController@sendContactUsFooter']) !!}
								<div class="row">
										<div class="col-sm-12 top10">
											{!! Form::text('full_name', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Full Name *'])!!}
											<span class="text-danger">{{$errors->first('full_name')}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::text('email', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Email Address *'])!!}
											<span class="text-danger">{{$errors->first('email')}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::text('contact_number', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Contact number'])!!}
											<span class="text-danger">{{$errors->first('contact_number')}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::text('subject', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Subject *'])!!}
											<span class="text-danger">{{$errors->first('subject')}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::textarea('message', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Your message *'])!!}
											<span class="text-danger">{{$errors->first('message')}}</span>
										</div>
										<div class="col-sm-12">
											{!! Form::submit('SUBMIT', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
										</div>
									</div>
								{!! Form::close() !!}
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