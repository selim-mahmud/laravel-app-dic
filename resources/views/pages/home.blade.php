@extends('layouts.main')

@section('meta')
    <title>Home - Australian Driving Instructors Directory</title>
    <meta name="description" content="Search instructors directory and find Australian
    driving instructors or schools serving your suburb or postcode and contact to get driving lessons.">
    <meta name="keywords" content="driving instructors, driving schools, learner driver, driving lessons">
@stop

@section('header')
    @include('_partials.header')
@stop

@section('flash_message')
    @include('_partials.flash_message')
@stop
@php
    use App\Helpers\Dic as Dic;
@endphp
@section('content')
    <div id="page-preloader"><span class="spinner"></span></div>
    <div class="header-banner">
        <div style="height:100px"></div>
        <div class="container banner_text">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="semibold uppercase text-center white">Search your nearest driving instructors</h1>
                </div>

            </div>
        </div>
        <div class="home-2-filter container pl-15 pr-15">
            <div class="row">
                <div class="col-md-12">
                    <div class="make-reservation home-reservation">
                        @include('_partials.search_form')
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="featured-collection">
        <div class="container height100">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="about-title extrabold uppercase color333 width100">
                        <span class="bgfff">What you get here</span>
                    </h2>
                </div>
                <div class="col-md-12">
                    <p class="font14 color777 text-center">Learners find driving instructors :: driving instructors
                        find learners
                    </p>
                </div>
                <div class="col-md-12">
                    <div style="text-align: center" class="row">
                        <div class="col-sm-4 top30">
                            <div class="service_icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                            <h3 class="font15 extrabold uppercase color333 help-title">Find your instructors
                            </h3>
                            <p style="text-align: justify;" class="font13 color777 top10 help-desc">
                                Are you thinking to get a driving licence?
                                Are you lost finding a reliable driving instructor?
                                Then, you are in right place. Just search using your zipcode and
                                you will get a list of instructors serving your area.
                                Pick one with good ratings and feedback. After getting service, you will have
                                option to rate an instructor. It is so simple and absolutely free.
                            </p>
                            <p></p>
                            <div style="margin-left: 10px" class="text-left">
                                <a href="{{url('how-it-works-for-learners')}}" class="inline-block">
                                    <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                        Read more
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 top30">
                            <div class="service_icon"><span class="glyphicon glyphicon-gift"></span></div>
                            <h3 class="font15 extrabold uppercase color333 help-title">Help learners find you
                            </h3>
                            <p style="text-align: justify; width:100%" class="font13 color777 top10 help-desc">
                                Are you running a driving school? Are you facing problem getting decent number
                                of students? Then, probably you need more exposure on online to reach to the community.
                                What you need to do, is to get your school registered on our application, complete
                                your profile, service, service area and you are good to go. Remember this service is absolutely free.
                            </p>
                            <p></p>
                            <div style="margin-left: 10px" class="text-left">
                                <a href="{{url('how-it-works-for-instructors')}}" class="inline-block">
                                    <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                        Read more
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 top30">
                            <div class="service_icon"><span class="glyphicon glyphicon-grain"></span></div>
                            <h3 class="font15 extrabold uppercase color333 help-title">Help grow your driving
                                school
                            </h3>
                            <p style="text-align: justify;" class="font13 color777 top10 help-desc">
                                Driving Instructors Catalog - DIC is giving you a great opportunity to grow
                                your driving school business. Our application is search engine
                                optimized. That means, you will be easily found by people looking for driving instructors
                                online. We have online rating and customer feedback system. The more you get good
                                rating and feedback, the more you will grow.
                            </p>
                            <p></p>
                            <div style="margin-left: 10px" class="text-left">
                                <a href="{{url('how-it-works-for-instructors')}}" class="inline-block">
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
    <!-- ========= end what you get section ========== -->

    <!-- ========= start of call to action ========== -->
    <div class="about-nav">
        <div class="container">
            <div class="row navigation-row margin0">
                <div style="height: 110px;" class="col-md-8 col-sm-8 about-nav-left">
                    <ul style="padding: 0 0 0 10px;" class="list-styles colorfff">
                        <li style="padding-right:60px"><i class="fa fa-chevron-right" aria-hidden="true"></i>Promote your school</li>
                        <li style="padding-right:60px"><i class="fa fa-chevron-right" aria-hidden="true"></i>Help learner find you</li>
                        <li style="padding-right:60px"><i class="fa fa-chevron-right" aria-hidden="true"></i>Absolutely free</li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4 about-nav-right top-10">
                    <div class="nav-right-cont uppercase colorfff">
                        <a href="{{url('register-as-school')}}"><h6><b><i class="font13 fa fa-angle-double-right"></i> Get your school listed<i class="font13 fa fa-angle-double-left"></i></b></h6></a>
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
                        <a href="{{url('instructors/new-south-wales')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>New South Wales</div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <a href="{{url('instructors/victoria')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>Victoria</div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <a href="{{url('instructors/queensland')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>Queensland</div></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <a href="{{url('instructors/australian-capital-territory')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>Australian Capital Territory</div></a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <a href="{{url('instructors/western-australia')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>Western Australia</div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="table-categories">
                        <a href="{{url('instructors/south-australia')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>South Australia</div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <a href="{{url('instructors/northern-territory')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>Northern Territory</div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="table-categories">
                        <a href="{{url('instructors/tasmania')}}"><div style="border:0; padding-bottom:0" class="cat-header"><i class="fa fa-graduation-cap">&nbsp;</i>Tasmania</div>
                        </a>
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
                    <h2 class="about-title extrabold uppercase color333 top60 btm15">
                        <span class="bgf3">Recently added instructors</span>
                    </h2>
                    <p class="font14 color777 text-center">Our instructors directory is growing. Please have a look some
                        of them.
                    </p>
                    <div class="row">
                        @if($schools->isEmpty())
                            @foreach($schools as $school)
                                <div class="col-md-3 col-md-6">
                                    <div class="member-prof">
                                        <div class="memb-photo memb-photo1">
                                            <a href="{{url('driving-schools/'.strtolower(str_replace(' ', '-', $school->name)))}}"><img height="180" width="260"
                                                            src="{{$school->profile_photo_url?asset($school->profile_photo_url):asset(config('dic.default_learner_profile_photo'))}}" alt="{{$school->name}}"></a>
                                        </div>
                                        <div class="memb-txt">
                                            <b class="font14 color333 uppercase"> <a href="{{url('driving-schools/'.strtolower(str_replace(' ', '-', $school->name)))}}">{{ str_limit($school->name, 26)}}</a></b><br/>
                                            <div class="{{$school->id}}"></div>
                                            <p class="font12 color777">{{$school->contacts[0]->address?$school->contacts[0]->address:'No address has been set.'}}</p>
                                            <div class="font12 color777 top10"><i class="fa fa-phone"></i> <b>{{$school->contacts[0]->phone?$school->contacts[0]->phone:'Not set yet'}}</b></div>

                                            <a href="{{url('driving-schools/'.strtolower(str_replace(' ', '-', $school->name)))}}" class="inline-block top10">
                                                <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">View
                                                    details
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h3>No school recently added.</h3>
                                <a href="{{url('register-as-school')}}" class="inline-block top10">
                                    <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">Add your school now</div>
                                </a>
                            </div>
                        @endif
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
                    <div class="valign-table-cell height100 text-center"><br />
                        <div class="hidden-xs" style="height:40px"></div>
                        <div class="font28 orange uppercase"><b>Grow your driving school with us - Its Free</b></div>
                        <a href="{{url('register-as-school')}}" class="inline-block top10">
                            <div class="blue-gradient-btn readmore-btn b-radius3 uppercase">Get your driving school listed
                            </div>
                        </a>
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
                    <h2 class="about-title extrabold uppercase color333 width100">
                        <span class="bgfff">Our Recent Blog Posts</span>
                    </h2>
                </div>
                <div class="col-md-12">
                    <div class="row-we-help-under">
                        <div class="valign-table height100">
                            <div class="valign-table-cell height100">
                                <div class="row">
                                    @if(!$publishedPosts->isEmpty())
                                        @foreach($publishedPosts as $publishedPost)
                                            <div class="col-sm-4 top30">
                                                <div class="memb-photo memb-photo1">
                                                    <img height="220" width="100%" src="{{asset($publishedPost->feature_image_thumbnail)}}"
                                                         alt="{{$publishedPost->title}}">
                                                </div>
                                                <h3 class="font15 extrabold uppercase color333 help-title">
                                                    {{str_limit($publishedPost->title, 35)}}
                                                </h3>
                                                <p style="text-align: justify" class="font13 color777 top10 help-desc">
                                                    {{str_limit($publishedPost->excerpt, 180)}}
                                                </p>
                                                <p></p>
                                                <a style="margin-left: 10px" href="{{url('blog', [$publishedPost->slug])}}" class="inline-block">
                                                    <div class="grey-gradient-btn readmore-btn b-radius3 color777 uppercase">
                                                        Read more
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <h2>No blog post found.</h2>
                                    @endif

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
<script>
    $(document).ready(function(){
        @foreach($schools as $school)
            $(".{{$school->id}}").starRating({
            readOnly: true,
            initialRating: {{Dic::getReviewStat($school->id)['average']}},
            starSize: 20,
            activeColor: 'orangered',
            useGradient: false
        });
        @endforeach
    });

</script>
@endpush