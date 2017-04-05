@extends('layouts.main')

@section('meta')
    <title>Driving instructors - Australian Driving Instructors Directory</title>
    <meta name="description" content="Driving instructors or schools can register here to be listed and to get learner driver">
    <meta name="keywords" content="driving instructors, driving school, learner driver, driving lesson">
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
    {!! getRatingSchemaCodeInJson(5, 52) !!}
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="color333"><span class="extrabold uppercase bgfff p-right20">How it works for instructors</span></h1>
                    <p>
                        Driving Instructors Catalog - DIC is giving you a great opportunity to
                        grow your driving school business. Our application is search engine optimized.
                        That means, you will be easily found by people looking for driving instructors online.
                        We have online rating and customer feedback system. The more you get good rating and
                        feedback, the more you will grow.
                    </p>

                    <p>
                        Are you running a driving school? Are you facing problem getting decent number of students?
                        Then, probably you need more exposure on online to reach to the community.
                        What you need to do, is to get your school registered on our application,
                        complete your profile, service, service area and you are good to go.
                        Remember this service is absolutely free.
                    </p>
                    <br />
                    <h3 class="universal-title">Steps to follow to get listed in our directory</h3>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-styles start0">
                                <li class="top10"><i class="fa blue-circle">1</i> Register by following <a href="{{url('register-as-school')}}">this link</a></li>
                                <li><i class="fa blue-circle">2</i> You will receive a confirmation email with account activation link.
                                    Follow the activation link to activate your account.</li>
                                <li><i class="fa blue-circle">3</i> Login to your control panel by following <a href="{{url('login')}}">this login link</a>.</li>
                                <li><i class="fa blue-circle">4</i> On your control panel go through each steps and try to put as much information as you can</li>
                                <li><i class="fa blue-circle">5</i> Upload your school's profile photo it could be your logo or any image like this.</li>
                                <li><i class="fa blue-circle">6</i> Set other profile info like description, email, school name etc.</li>
                                <li><i class="fa blue-circle">7</i> Set contact address, your services, instructors personal details,
                                    some photo to display on your profile page</li>
                                <li><i class="fa blue-circle">8</i> Set your service areas (suburbs). You can set multiple suburbs where you are available
                                    for your driving lessons service. This is very important because based on this service area your profile will appear on search result.</li>
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
    </div>

    <br/>
    <br/>
@stop

@section('footer')
    @include('_partials.footer')
@stop

@push('scripts_stack')

@endpush