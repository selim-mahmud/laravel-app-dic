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
@section('content')
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div style="padding:30px 20px; color:#00BFF3; margin-bottom:30px; font-size: 20px;" class="about-1 text-center color333 top40 bgf7">
                        Getting a good driving instructor without reference from close mates or community is really a difficult job. Driving Instructors Catalog (DIC) is a brain child of a person who faced lots of
                        trouble when he decided to have a australian driving licence.
                    </div>
                </div>
                <div class="m1170">
                    <div class="about-1-content top40">
                        <div class="col-sm-6 about-1-pict top20">
                            <img src="{{asset('img/theme/about.jpg')}}" alt="about us" >
                        </div>
                        <div class="col-sm-6 about-1-content-txt top20">
                            <h5 class="f-left width100"><b class="color333 uppercase">ALL ABOUT Driving Instructors Catalog (DIC)</b></h5>
                            <div class="top30 font13 color777">
                                Driving Instructors Catalog (DIC) is an online platform that brings driving instructors
                                and learner drivers together under one umbrella. When we as a learner driver looks for an instructor,
                                we always want someone with whom we feel comfortable to drive. This web application makes
                                the job of finding your desired instructor, easy. You can search your neaby instructors and pick the
                                best one based on his/her ratings and community feedback.
                                <br /><br />
                                On the other hand, DIC gives great opportunity to driving schools and instructors to expand their business
                                by getting good rating and feedback from the community. This web application is a great
                                opportunity of marketing for driving school businesses.
                            </div>
                        </div>
                        <div class="clearfix"></div><br />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br/>
    <br/>
@stop

@section('footer')
    @include('_partials.footer')
@stop

@push('scripts_stack')

@endpush