@extends('layouts.main')

@section('meta')
    <title>Getting driving licence in South Australia - Australian Driving Instructors Directory</title>
    <meta name="description" content="Please go through the page to know the rules of getting licence in Victoria.">
    <meta name="keywords" content="driving licence in South Australia, driving instructors, driving school, learner driver, driving lesson">
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
    {!! getRatingSchemaCodeInJson(4.2, 32) !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img width="100%" src="{{asset('img/theme/getting-licence-in-sa.jpg')}}" alt="Getting car driving licence in South Australia">
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="color333"><span class="extrabold uppercase bgfff p-right20">Getting car driving licence in South Australia</span></h1>
                    <p>
                        <a target="_blank" href="https://www.vicroads.vic.gov.au">VicRoads</a> is the authorised organization who is responsible to
                        assess learner drivers and issue driving licence in Victoria.
                        VicRoads has a set of rules and process to get full driving licence from L plate.
                        <a target="_blank" href="https://www.sa.gov.au/">Department of the premier and cabinet</a> is the authorised organization who
                        is responsible to assess learner drivers and issue driving licence in South Australia.
                    </p>

                    <h3 class="universal-title">Steps to getting your driver's licence</h3>
                    <p>Getting a driver's licence involves gradually progressing through a series of
                        stages until you are ready to graduate to a full driver's licence.</p>
                    <ul class="list-styles start0">
                        <li class="top10"><i class="fa blue-circle">1</i>Booking and passing a licence theory test</li>
                        <li><i class="fa blue-circle">2</i>A learner's permit</li>
                        <li><i class="fa blue-circle">3</i>Completing compulsory driving hours during the learner's permit stage</li>
                        <li><i class="fa blue-circle">4</i>Booking and passing a compulsory hazard perception test</li>
                        <li><i class="fa blue-circle">5</i>P1 provisional licence for one year</li>
                        <li><i class="fa blue-circle">6</i>P2 provisional licence for two years</li>
                        <li><i class="fa blue-circle">7</i>Graduating to a full driver's licence.</li>
                    </ul>
                    <h3 class="universal-title">Driving with an overseas licence</h3>
                    <p>If you are visiting from overseas, or you've moved here permanently,
                        make sure that you are driving legally and safely. You need to convert
                        your overseas licence. For more info, please visit <a href="https://www.sa.gov.au/">sa.gov.au</a></p>
                    <br />

                    <div class="big-message message-white b-radius5">
                        <i class="fa fa-bell">&nbsp;</i>
                        <h6>References</h6>
                        <p><a target="_blank" href="https://www.sa.gov.au/">sa.gov.au</a></p>
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