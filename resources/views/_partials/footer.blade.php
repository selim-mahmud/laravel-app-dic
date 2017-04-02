
<footer>
			<div class="container-fluid">
				<div class="row f-first-row newsletter" style="margin-top: 0px!important;">
					<div style="text-align: center;" class="col-sm-6 f-newsletter-l">
						<h3><b class="colorfff uppercase">Newsletter signup</b></h3>
Get registered for update from DIC
</div>
					<div class="col-sm-6 newsletter-bg padding0">
						{!! Form::open(['method' => 'post', 'action' => 'PageController@subscribe']) !!}
						<div class="newsletter-input">

								<input name="signup_email" class="newsletter-inpup-field width100" placeholder="Your email">
								<input type="submit" value="SIGNUP" class="newsletter-signup f-right">

						</div>
						{!! Form::close() !!}
						<span class="text-danger">{{isset($errors)?$errors->first('signup_email'):''}}</span>
					</div>
				</div>
				<div class="row f-second-row footer">
					<div class="m1170">
						<div class="col-sm-4 f-1td top40">
							<h5 class="uppercase colorfff footer-title"><b class="footer-title">About Us</b></h5>
							<div class="footer-logo top30"><div class="no-wrap"><a class="footerLogo" href="/"><img src="{{asset('img/theme/dic_logo.png')}}" alt="Logo"></a></div></div>
							<div class="footer-td1-txt coloraaa top30 p-right20">
                                Getting a good driving instructor without reference from close mates or
								community is really a difficult job. Driving Instructors Catalog (DIC) is a
								brain child of a person who faced lots of trouble when he decided to have a australian driving licence.
							</div><br />
							<a href="{{url('about-us')}}" class="button1-1 b-radius3 right30 button-blue top20">Read More</a>
							<div class="clearfix"></div><br /><br />
							<script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=258284101215362";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
							</script>
							<div style="margin-bottom: 15px" class="fb-page" data-href="https://www.facebook.com/drivinginstructorscatalog" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/drivinginstructorscatalog" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/drivinginstructorscatalog">DIC - Driving Instructors Catalog</a></blockquote></div>
						</div>

						<div class="col-sm-4 f-2td top40" >
							<h5 class="uppercase colorfff"><b class="footer-title">important links</b></h5>
							<ul class="list-styles left-40 top30 f-left coloraaa footer-list p-right20">
								<li><a target="_blank" href="http://www.rms.nsw.gov.au/roads/index.html"><i class="fa fa-chevron-right"></i>Roads and Maritime - NSW</a></li>
								<li><a target="_blank" href="https://www.vicroads.vic.gov.au/licences"><i class="fa fa-chevron-right"></i>VicRoads - VIC</a></li>
								<li><a target="_blank" href="https://www.tmr.qld.gov.au/Licensing"><i class="fa fa-chevron-right"></i>Transport & Main Roads - QLD</a></li>
								<li><a target="_blank" href="http://www.transport.wa.gov.au/licensing/my-drivers-licence.asp"><i class="fa fa-chevron-right"></i>WA Transport</a></li>
								<li><a target="_blank" href="https://www.sa.gov.au/topics/driving-and-transport"><i class="fa fa-chevron-right"></i>Driving & Transport - SA</a></li>
								<li><a target="_blank" href="https://nt.gov.au/driving"><i class="fa fa-chevron-right"></i>Driving and transport - NT</a></li>
								<li><a target="_blank" href="http://www.transport.tas.gov.au/licensing/getting-a-licence"><i class="fa fa-chevron-right"></i>TAS - Transport</a></li>

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
											<span class="text-danger">{{isset($errors)?$errors->first('full_name'):''}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::text('email', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Email Address *'])!!}
											<span class="text-danger">{{isset($errors)?$errors->first('email'):''}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::text('contact_number', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Contact number'])!!}
											<span class="text-danger">{{isset($errors)?$errors->first('contact_number'):''}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::text('subject', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Subject *'])!!}
											<span class="text-danger">{{isset($errors)?$errors->first('subject'):''}}</span>
										</div>
										<div class="col-sm-12 top10">
											{!! Form::textarea('message', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Your message *'])!!}
											<span class="text-danger">{{isset($errors)?$errors->first('message'):''}}</span>
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
								&copy; {{date("Y")}} Driving Instructors Catalog - All Rights Reserved. <a href="{{asset('privacy-policy')}}">Privacy Policy </a>
</div>
<div class="col-sm-6 right-footer2">
    <a style="margin-right:15px;" target="_blank" href="https://www.facebook.com/drivinginstructorscatalog">
        <div class="img-icons-2"><i class="fa fa-facebook">&nbsp;</i></div>
    </a>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<a id="to-top" href="#header-top"><i class="fa fa-chevron-up"></i></a>
</footer>