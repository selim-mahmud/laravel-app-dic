@extends('layouts.main')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@section('header')
    @include('_partials.header')
@stop

@section('flash_message')
    @include('_partials.flash_message')
@stop

@section('content')

    <!-- Loader -->
    <div id="page-preloader"><span class="spinner"></span></div>
    <!-- Loader end -->

    <!-- ========= start of header banner ========== -->
    <div class="header-banner">

        <!-- ========= banner image ========== -->
        <img src="{{asset('img/theme/home_banner.jpg')}}" data-src="media/backgrounds/home2-bg.jpg" alt="Image"/>

        <!-- ========= banner text ========== -->
        <div class="container banner_text">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font42 semibold uppercase text-center white">Search your nearest driving instructors</h2>
                </div>

            </div>
        </div>

        <!-- ========= search bar ========== -->
        <div class="home-2-filter container pl-15 pr-15">
            <div class="row">
                <div class="col-md-12">
                    <div class="make-reservation home-reservation">
                        <div class="reservation-dropdowns">
                            <div class="col-sm-3 p-left0 p-right0">
                                <div class="btn-group width100">
                                    <input class="dropdown-btn-list dropdown-btn1 dropdown-btn1-1 btn btn-lg dropdown-toggle"
                                           type="text" placeholder="keywords" onclick="this.focus()">
                                </div>
                            </div>
                            <div class="col-sm-2 p-left0 p-right0">
                                <div class="btn-group width100">
                                    <div class="custom-select select-type4 high location">
                                        <select class="chosen-select">
                                            <option value="1">- Choose State -</option>
                                            <option value="2">NSW</option>
                                            <option value="3">VIC</option>
                                            <option value="4">SA</option>
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
                                    <a href="#">
                                        <div class="find-btn">Search</div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div><!-- end of .header-banner -->
    <!-- ========= end of header banner ========== -->


    <!-- ========= start of what you get section ========== -->
    <div class="featured-collection">
        <div class="container height100">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-title extrabold uppercase color333 width100">
                        <span class="bgfff">What you get here</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="font14 color777 text-center">Learners find driving instructors :: driving instructors
                        find learners
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row-we-help-under">
                        <div class="valign-table height100">
                            <div class="valign-table-cell height100 text-center">
                                <div class="col-sm-4 top30">
                                    <div class="service_icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                    <div class="font15 extrabold uppercase color333 help-title">Find your instructors
                                    </div>
                                    <div class="font13 color777 top10 help-desc">Eiusmod tempor incidiunt labore velit
                                        dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laboris
                                    </div>
                                    <br/>
                                    <div class="text-center">
                                        <a href="#" class="inline-block">
                                            <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                                Read more
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 top30">
                                    <div class="service_icon"><span class="glyphicon glyphicon-gift"></span></div>
                                    <div class="font15 extrabold uppercase color333 help-title">Help learners find you
                                    </div>
                                    <div class="font13 color777 top10 help-desc">Eiusmod tempor incidiunt labore velit
                                        dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laboris
                                    </div>
                                    <br/>
                                    <div class="text-center">
                                        <a href="#" class="inline-block">
                                            <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                                Read more
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 top30">
                                    <div class="service_icon"><span class="glyphicon glyphicon-grain"></span></div>
                                    <div class="font15 extrabold uppercase color333 help-title">Help grow your driving
                                        school
                                    </div>
                                    <div class="font13 color777 top10 help-desc">Eiusmod tempor incidiunt labore velit
                                        dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laboris
                                    </div>
                                    <br/>
                                    <div class="text-center">
                                        <a href="#" class="inline-block">
                                            <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                                Read more
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ========= end what you get section ========== -->

    <!-- ========= start of call to action ========== -->
    <div class="about-nav">
        <div class="container">
            <div class="row navigation-row margin0">
                <div style="height: 110px;" class="col-md-8 col-sm-8 about-nav-left">
                    <ul style="padding: 0 0 0 10px;" class="list-styles colorfff">
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Promote your driving school</li>
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Help learners find you</li>
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>First in Australia</li>
                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Free</li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4 about-nav-right top-10">
                    <div class="nav-right-cont uppercase colorfff">
                        <a href="09-pricing.html"><h6><b><i class="font13 fa fa-angle-double-right"></i> Get your
                                    driving school listed<i class="font13 fa fa-angle-double-left"></i></b></h6></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ========= end of call to action ========== -->

    <!-- ========= start of brouse section ========== -->
    <div class="row-browse-categories p-bottom40">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 p-top80">
                    <div class="about-title extrabold uppercase color333 width100">
                        <span class="bgfff">BROWSE BY States</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-home">&nbsp;</i>New South Wales</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Hotels & Motels</a>
                                </td>
                                <td class="cat-td2">[205]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Bed & Breakfast</a>
                                </td>
                                <td class="cat-td2">[95]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Apartment Hotels</a>
                                </td>
                                <td class="cat-td2">[106]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Out-of-Town
                                        Rooms</a>
                                </td>
                                <td class="cat-td2">[6]</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>Victoria</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Academic Courses</a>
                                </td>
                                <td class="cat-td2">[1007]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Colleges &
                                        Universities</a>
                                </td>
                                <td class="cat-td2">[590]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Elementary &
                                        High Schools</a>
                                </td>
                                <td class="cat-td2">[641]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="03-category-1.html"><i class="fa fa-angle-right">&nbsp;</i>Kindergartens &
                                        Pre-School</a>
                                </td>
                                <td class="cat-td2">[70]</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-youtube-play">&nbsp;</i>Queensland</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Movie
                                        Theatres</a>
                                </td>
                                <td class="cat-td2">[590]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Family & Night
                                        Life</a>
                                </td>
                                <td class="cat-td2">[641]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Television
                                        Programs</a>
                                </td>
                                <td class="cat-td2">[70]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Television
                                        Programs</a>
                                </td>
                                <td class="cat-td2">[70]</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-user-md">&nbsp;</i>Australian Capital Territory</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Dental Care</a>
                                </td>
                                <td class="cat-td2">[742]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Fitness & Weight
                                        Loss</a>
                                </td>
                                <td class="cat-td2">[2056]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Medical Products
                                        & Equipment</a>
                                </td>
                                <td class="cat-td2">[84]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="04-category-2.html"><i class="fa fa-angle-right">&nbsp;</i>Eye Care &
                                        Eyewear</a>
                                </td>
                                <td class="cat-td2">[629]</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-coffee">&nbsp;</i>Western Australia</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Desserts &
                                        Bakery Products</a>
                                </td>
                                <td class="cat-td2">[350]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Dairy
                                        Products</a>
                                </td>
                                <td class="cat-td2">[1260]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Food Services &
                                        Supplies</a>
                                </td>
                                <td class="cat-td2">[64]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Meat & Fish</a>
                                </td>
                                <td class="cat-td2">[138]</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-coffee">&nbsp;</i>South Australia</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Desserts &
                                        Bakery Products</a>
                                </td>
                                <td class="cat-td2">[350]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Dairy
                                        Products</a>
                                </td>
                                <td class="cat-td2">[1260]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Food Services &
                                        Supplies</a>
                                </td>
                                <td class="cat-td2">[64]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Meat & Fish</a>
                                </td>
                                <td class="cat-td2">[138]</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-coffee">&nbsp;</i>Northern Territory</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Desserts &
                                        Bakery Products</a>
                                </td>
                                <td class="cat-td2">[350]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Dairy
                                        Products</a>
                                </td>
                                <td class="cat-td2">[1260]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Food Services &
                                        Supplies</a>
                                </td>
                                <td class="cat-td2">[64]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Meat & Fish</a>
                                </td>
                                <td class="cat-td2">[138]</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="table-categories">
                        <div class="cat-header"><i class="fa fa-coffee">&nbsp;</i>Tasmania</div>
                        <table class="table-cat-inf">
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Desserts &
                                        Bakery Products</a>
                                </td>
                                <td class="cat-td2">[350]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Dairy
                                        Products</a>
                                </td>
                                <td class="cat-td2">[1260]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Food Services &
                                        Supplies</a>
                                </td>
                                <td class="cat-td2">[64]</td>
                            </tr>
                            <tr>
                                <td class="cat-td1">
                                    <a href="05-category-3.html"><i class="fa fa-angle-right">&nbsp;</i>Meat & Fish</a>
                                </td>
                                <td class="cat-td2">[138]</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========= end of brouse section ========== -->

    <!-- ========= start of recently added instructor section ========== -->
    <div class="row-explore-nerby bgf3 p-bottom60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about-title extrabold uppercase color333 top60 btm15">
                        <span class="bgf3">Recently added instructors</span>
                    </div>
                    <div class="font14 color777 text-center">Our instructors directory is growing. Please have look some
                        of them.
                    </div>

                    <div id="myCarousel2" class="carousel slide blog-reviews" data-interval="3000">
                        <ol class="carousel-indicators blog-reviews-pagination">
                            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel2" data-slide-to="1"></li>
                            <li data-target="#myCarousel2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="active item">
                                <div class="members-acc">
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="members-acc">
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 top60 f-left">
                                        <div class="member-prof">
                                            <div class="memb-photo memb-photo1">
                                                <img height="180" width="260"
                                                     src="{{asset('img/theme/relat-list-1.jpg')}}" alt="wd">
                                            </div>
                                            <div class="memb-txt">
                                                <b class="font14 color333 uppercase">Name of driving school</b><br/>
                                                <ul class="list-styles raitings-stars p-left10 inl-flex">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <p class="font12 color777">5108 Macarthur Blvd NW Unit B, Washington, DC
                                                    20016</p>
                                                <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>(202)
                                                        364-6772</b></div>

                                                <a href="#" class="inline-block top10">
                                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                        details
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ========= end of recently added instructors ========== -->

    <div class="row-we-help">
        <div class="container valign-table height100">
            <div class="row">
                <div class="col-md-12">
                    <div class="valign-table-cell height100 text-center">
                        <div class="font28 orange uppercase"><b>Recent activities on our site</b></div>
                        <div class="font14 colorfff text-center">Discover how we do it - From promoting your business to
                            get you potential clients !!!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========= start of blog section ========== -->
    <div class="featured-collection">
        <div class="container height100">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-title extrabold uppercase color333 width100">
                        <span class="bgfff">Our Recent Blog Posts</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row-we-help-under">
                        <div class="valign-table height100">
                            <div class="valign-table-cell height100 text-center">
                                <div class="col-sm-4 top30">
                                    <div class="memb-photo memb-photo1">
                                        <img height="180" width="260" src="{{asset('img/theme/relat-list-1.jpg')}}"
                                             alt="wd">
                                    </div>
                                    <div class="font15 extrabold uppercase color333 help-title">Find your instructors
                                    </div>
                                    <div class="font13 color777 top10 help-desc">Eiusmod tempor incidiunt labore velit
                                        dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laboris
                                    </div>
                                    <br/>
                                    <div class="text-center">
                                        <a href="#" class="inline-block">
                                            <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                                Read more
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 top30">
                                    <div class="memb-photo memb-photo1">
                                        <img height="180" width="260" src="{{asset('img/theme/relat-list-1.jpg')}}"
                                             alt="wd">
                                    </div>
                                    <div class="font15 extrabold uppercase color333 help-title">Help learners find you
                                    </div>
                                    <div class="font13 color777 top10 help-desc">Eiusmod tempor incidiunt labore velit
                                        dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laboris
                                    </div>
                                    <br/>
                                    <div class="text-center">
                                        <a href="#" class="inline-block">
                                            <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                                Read more
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 top30">
                                    <div class="memb-photo memb-photo1">
                                        <img height="180" width="260" src="{{asset('img/theme/relat-list-1.jpg')}}"
                                             alt="wd">
                                    </div>
                                    <div class="font15 extrabold uppercase color333 help-title">Help grow your driving
                                        school
                                    </div>
                                    <div class="font13 color777 top10 help-desc">Eiusmod tempor incidiunt labore velit
                                        dolore magna aliqu sed eniminim veniam quis nostrud exercition eullamco laboris
                                    </div>
                                    <br/>
                                    <div class="text-center">
                                        <a href="#" class="inline-block">
                                            <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                                Read more
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ========= end of blog section ========== -->
@stop

@section('footer')
    @include('_partials.footer')
@stop

@push('scripts_stack')
{{-- <script src="js/head_script_example.js"></script> --}}
@endpush