@extends('layouts.main')

@section('meta')
    <title>Getting driving licence in Victoria - Australian Driving Instructors Directory</title>
    <meta name="description" content="Please go through the page to know the rules of getting licence in Victoria.">
    <meta name="keywords" content="driving licence in victoria, driving instructors, driving school, learner driver, driving lesson">
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
    {!! getRatingSchemaCodeInJson(4.5, 130) !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img width="100%" src="{{asset('img/theme/getting-licence-in-vic.jpg')}}" alt="Getting car driving licence in Victoria">
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="color333"><span class="extrabold uppercase bgfff p-right20">Getting car driving licence in Victoria</span></h1>
                    <p>
                        <a target="_blank" href="https://www.vicroads.vic.gov.au">VicRoads</a> is the authorised organization who is responsible to
                        assess learner drivers and issue driving licence in Victoria.
                        VicRoads has a set of rules and process to get full driving licence from L plate.
                    </p>

                    <h3 class="universal-title">Steps from learner to full licence</h3>
                    <p>There are 4 steps to progress from a learner to a full licence:</p>
                    <ul class="list-styles start0">
                        <li class="top10"><i class="fa blue-circle">1</i>Getting learner's permit</li>
                        <li><i class="fa blue-circle">2</i>Getting provisional licence (p1)</li>
                        <li><i class="fa blue-circle">3</i>Getting provisional licence (p2)</li>
                        <li><i class="fa blue-circle">4</i>Getting full licence </li>
                    </ul>
                    <h3 class="universal-title">Getting learner's permit</h3>
                    <p>A car learner permit allows you to drive a car on the road with an
                        experienced driver while you are learning to drive. Find out how to
                        get your learner permit and access the online practice learner permit knowledge test.</p>
                    <p>If you’re 16 or older and live in Victoria, you can apply to get your car learner permit.
                        You have to pay and pass the learner permit knowledge test to get a learner's permit.</p>
                    <h3 class="universal-title">Getting provisional licence</h3>
                    <p>If you have learner's permit and have practised a certain number of hours,
                        you are eligible to get your provisional licence.  You must be at least 18
                        years of age and a Victorian resident to be eligible to apply for a probationary
                        driver licence.  If you are under the age of 21, have completed and recorded in
                        your learner log book a minimum of 120 hours of supervised driving, including at
                        least 10 hours at night (unless an exemption has been granted) and hold a current
                        car learner permit for a continuous minimum period immediately before applying for
                        a driver licence (unless an exemption from this requirement has been granted), you
                        can take a Hazard perception test and driving test. After passing those test,
                        you will get your provisional licence.</p>

                    <br />
                    <div class="big-message message-white b-radius5">
                        <i class="fa fa-bell">&nbsp;</i>
                        <h6>References</h6>
                        <p><a target="_blank" href="https://www.vicroads.vic.gov.au">VicRoads</a></p>
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