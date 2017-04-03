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
                <div class="col-md-12">
                    <h1 class="color333"><span class="extrabold uppercase bgfff p-right20">How it works for learners</span></h1>
                    <p>
                        Are you thinking to get a driving licence? Are you lost finding
                        a reliable driving instructor? Then, you are in right place.
                        Just search using your zipcode and you will get a list of instructors
                        serving your area. Pick one with good ratings and feedback.
                        After getting service, you will have option to rate an instructor.
                        It is so simple and absolutely free.
                    </p>

                    <br />
                    <h3 class="universal-title">Steps to follow to get a desired instructor</h3>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-styles start0">
                                <li class="top10"><i class="fa blue-circle">1</i> Put your suburb and hit search by following <a href="{{url('/')}}">this link</a></li>
                                <li><i class="fa blue-circle">2</i> You will find a list of instructors servicing your postcode.</li>
                                <li><i class="fa blue-circle">3</i> Go through the list of instructors and their profile page</li>
                                <li><i class="fa blue-circle">4</i> Have a look at their rating and comments by previous learners</li>
                                <li><i class="fa blue-circle">5</i> Choose an instructor from the list and contact him</li>
                                <li><i class="fa blue-circle">6</i> After getting your lesson, please do not forget to write a comment and rate your instructor.
                                    Your rating will be helpful for future learners.</li>
                                <li><i class="fa blue-circle">7</i> To give your feedback, you have to register by following <a
                                            href="{{url('register-as-learner')}}">this link</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('img/theme/how-it-works.jpg')}}" class="img-rounded img-responsive" alt="how it works for instructors">
                        </div>
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