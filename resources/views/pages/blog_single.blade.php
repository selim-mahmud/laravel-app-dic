
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

	<div class="listing-details-main">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 top80">
					<article><h2 class="hidden">WD</h2>
						<div class="first-post">
							<div class="first-pict">
								<img src="{{asset('img/theme/new-det-pict.jpg')}}" alt="wd">
								<div class="pict-data uppercase">Friday, November 30, 2015</div>
							</div>
							<div class="font22 color333 extrabold uppercase top30">amet consectetur adipisicing elit</div>
							<div class="f-left p-right20">
								<ul class="list-styles new-first-det start0 f-left top10">
									<li><a href="#"><i class="fa fa-user">&nbsp;</i>Madam Tusao</a></li>
									<li><a href="#"><i class="fa fa-heart-o">&nbsp;</i>30 Likes</a></li>
								</ul>
							</div>
							<div class="f-left">
								<ul class="list-styles new-first-det start0 f-left top10">
									<li><a href="#"><i class="fa fa-folder-open-o">&nbsp;</i>FOOD</a></li>
									<li><a href="#"><i class="fa fa-share-alt">&nbsp;</i>share</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
							<div class="s-row-line margin20">
							</div>
							<div class="color777">
								Eiusmod tempor incidiunt labore velit dolore magna aliqu sed enimi nim veniam quis nostraud exercition eulamco laboris orem ipsu
								dolor sit amet, consectetur adipisicing elit sed eiusmod tempor incididunt labore etu dolore magna aliqua ut enim ad minim vienias
								quis nostrud exercitation ullamco laboris nisi aliquip commod. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmo
								tempor incididunt ut labore et dolore magna aliqua. 
								<br /><br />
								Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
								reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident sunt in culp
								qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremq
								laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis quasi architecto.
							</div>
							<table class="italic blog-det-blockquote">
								<tbody><tr>
										<td class="vtop"><i class="fa fa-quote-left fa-3x pull-left blockquote1"></i></td>
										<td class="blockquote-style1 orange">
											We help new customers & search engines to
											find your business online !!!<br>
											<span class="seo-wisem color777"><b>CEO Wisem Directory</b></span>
										</td>
									</tr>
								</tbody></table>
							<div class="color777 margin20">
								Excepteur sint occaecat cupidatat non proident sunt in culpa qui  officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.
							</div>
						</div>			
					</article>
					<article>
						<div class="second-post margin40">
							<div class="second-pict f-left">
								<img src="media/pages/new-det-pict2.jpg" alt="wd">
							</div>
							<h6><b class="color333 uppercase">nisi ut aliquip ex ea commodo consequat</b></h6>
							<div>Eiusmod tempor incidiunt labore velit dolore magna aliqu sed enimi nim veniam quis
								nostraud exercition eulamco laboris orem ipsum dolor sit amet consectetu adipisicing
								elit sed eiusmod tempor incididunt ut labore etu dolore.
								<br /><br />
								Magna aliqua ut enim a minim vieniads quis nostrud exercitation ullamco laboris nis
								aliquip commod. Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusm
								od tempor incididunt ut labore et dolore magna aliqua. 
							</div>
							<div class="width100 f-left">
								Ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehe
								nderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident sunt in culpa qui 
								officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
								laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis quasi architecto.
							</div>
							<div class="clearfix"></div>
							<div class="blog-news-nav top40">
								<a href="03-category-1.html"><div class="blog-nav-el padding0 fffimp"><i class="fa fa-tags"></i>
									</div></a>
								<a href="04-category-2.html"><div class="blog-nav-el uppercase border1 borderccc color777 left20">
										restaurants
									</div></a>
								<a href="05-category-3.html"><div class="blog-nav-el uppercase border1 borderccc color777 left20">
										music
									</div></a>
							</div>
						</div>
						<div class="clearfix"></div>
					</article>
					<div class="about-title extrabold uppercase top60">
						<span class="bgfff font22 color333">2 comments</span>
					</div>
					<div class="blog-det-comments">
						<div class="blog-det-comment top40">
							<div class="blog-comment-photo">
								<img src="{{asset('img/theme/blog-com1.jpg')}}" alt="wd">
							</div>
							<div class="font14 color333"><b>Christian Smith</b></div>
							<div>Eiusmod tempor incidiunt labore velit dol emagna aliqu sedu enim nim veniam ut quis nostraud exercition 
								eulam laboris orem ipsu dolor sit amet dui consectetur adipisicing elit sed eiusmod.
							</div>
							<div class="font11 semibold color333 top10">Posted 2 days ago <a href="#">REPLY</a></div>
						</div>
						<div class="blog-det-comment top40">
							<div class="blog-comment-photo">
								<img src="{{asset('img/theme/blog-com2.jpg')}}" alt="wd">
							</div>
							<div class="font14 color333"><b>Sam Anderson</b></div>
							<div>Eiusmod tempor incidiunt labore velit dol emagna aliqu sedu enim nim veniam ut quis nostraud exercition 
								eulam laboris orem ipsu dolor sit amet dui consectetur adipisicing elit sed eiusmod.
							</div>
							<div class="font11 semibold color333 top10">Posted 2 days ago <a href="#">REPLY</a></div>
						</div>
					</div>
					<div class="about-title extrabold uppercase top40">
						<span class="bgfff font22 color333">write a comment</span>
					</div>
					
					<div class="row">
						<form class="el-form-2 f-left width100 margin20" id="el-form-1">
							<div class="col-sm-6 top20"><input class="form-1-style2 border1 borderddd" onblur="" placeholder="Full Name *" />
							</div>
							<div class="col-sm-6 top20"><input class="form-1-style2 border1 borderddd" placeholder="Email Address *" />
							</div>
							<div class="col-sm-12 top20"><input class="form-1-style2 border1 borderddd" placeholder="Website" />
							</div>
							<div class="col-sm-12 top20">
								<textarea class="form-1-style2 border1 borderddd" placeholder="Comment" ></textarea>
								<input type="submit" value="SUBMIT" class="submit-btn button1-1 b-radius3 right30 button-orange top20">
							</div>
						</form>	
					</div>
								
					<div class="clearfix"></div>				
				</div>

				<div class="col-sm-3 top80">
					<div class="search width100">
						<input class="search-input width100 f-left borderccc" placeholder="Search Blog">
						<a href="#"><div class="search-button f-right"><i class="fa fa-search"></i></div></a>
					</div>
					<nav>
						<div class="nav-right-menu">
							<div class="right-title uppercase"><i class="fa fa-star"></i>categories</div>
							<ul class="start0">
								<li class="menu-link">Directory Listings</li>
								<li class="menu-link">Food & Drink</li>
								<li class="menu-link">Auto Dealers</li>
								<li class="menu-link">Shipping Companies</li>
								<li class="menu-link">Creative Agency</li>
								<li class="menu-link">Lawyers</li>
							</ul>
						</div>
						<div class="clearfix"></div>
					</nav>
					<div class="recent-coupons">
						<div class="right-title uppercase"><i class="fa fa-star"></i>recent coupons</div>
						<div class="coupon">
							<div class="coupon-img">
								<img src="{{asset('img/theme/coupon1.jpg')}}" alt="wd">
								<div class="off">50% OFF</div>
							</div>
							<a href="#"><div class="font14 color333 uppercase top10"><b>consecte tur dolore</b></div></a>
							<div>Eiusmod tempor incidiunt labore velit dol
								emagna aliqu sedu enimi...
							</div>
							<ul class="list-styles new-first-det start0 f-left">
								<li><a href="#"><i class="fa fa-heart-o">&nbsp;</i>30 Likes</a></li>
								<li><a href="#"><i class="fa fa-share-alt">&nbsp;</i>share</a></li>
							</ul><div class="clearfix"></div>
						</div>
						<div class="coupon">
							<div class="coupon-img">
								<img src="{{asset('img/theme/coupon2.jpg')}}" alt="wd">
								<div class="off">20% OFF</div>
							</div>
							<a href="#"><div class="font14 color333 uppercase top10"><b>consecte tur dolore magna</b></div></a>
							<div>Eiusmod tempor incidiunt labore velit dol
								emagna aliqu sedu enimi...
							</div>
							<ul class="list-styles new-first-det start0 f-left">
								<li><a href="#"><i class="fa fa-heart-o">&nbsp;</i>30 Likes</a></li>
								<li><a href="#"><i class="fa fa-share-alt">&nbsp;</i>share</a></li>
							</ul><div class="clearfix"></div>
						</div>
						<div class="coupon">
							<div class="coupon-img">
								<img src="{{asset('img/theme/coupon3.jpg')}}" alt="wd">
								<div class="off">20% OFF</div>
							</div>
							<a href="#"><div class="font14 color333 uppercase top10"><b>tur dolore magna</b></div></a>
							<div>Eiusmod tempor incidiunt labore velit dol
								emagna aliqu sedu enimi...
							</div>
							<ul class="list-styles new-first-det start0 f-left">
								<li><a href="#"><i class="fa fa-heart-o">&nbsp;</i>30 Likes</a></li>
								<li><a href="#"><i class="fa fa-share-alt">&nbsp;</i>share</a></li>
							</ul><div class="clearfix"></div>
						</div>
					</div>

					<div class="latest-tags">
						<div class="right-title uppercase"><i class="fa fa-star"></i>latest tags</div>
						<div class="blog-news-nav top20">
							<a href="04-category-2.html">
								<div class="blog-nav-el uppercase border1 borderccc color777 right7">Latest Offers</div>
							</a>
							<a href="04-category-2.html">
								<div class="blog-nav-el uppercase border1 borderccc color777 right7">Responsive</div>
							</a>
							<a href="04-category-2.html">
								<div class="blog-nav-el uppercase border1 borderccc color777 right7">recent listings</div>
							</a>
							<a href="03-category-1.html">
								<div class="blog-nav-el uppercase border1 borderccc color777 right7">restaurant</div>
							</a>
							<a href="03-category-1.html">
								<div class="blog-nav-el uppercase border1 borderccc color777 right7">Themeforest</div>
							</a>
							<a href="03-category-1.html">
								<div class="blog-nav-el uppercase border1 borderccc color777 right7">Web Design</div>
							</a>
							<a href="05-category-3.html">
								<div class="blog-nav-el uppercase border1 borderccc color777 right7">taxi hiring</div>
							</a>
							<a href="05-category-3.html">
								<div class="blog-nav-el uppercase border1 borderccc color777">Interior Painting</div>
							</a>
						</div>
					</div>

				</div>		
			</div>
		</div>
	</div>
	<br />
@stop