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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img width="100%" src="{{asset('img/theme/getting-licence-in-nsw.jpg')}}" alt="Getting car driving licence in New South Wales">
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="color333"><span class="extrabold uppercase bgfff p-right20">Getting car driving licence in New South Wales</span></h1>
                    <p class="big-text-dropcap dropcap">
                        ROads and <a target="_blank" href="http://www.rms.nsw.gov.au/">Maritime</a> is the authorised
                        organization who is responsible to assess learner drivers and issue driving licence.
                        Driving licence is a 'contract', or an agreement between you as a driver and the
                        rest of society. Roads and Maritime Services and the NSW Police administer this
                        contract on behalf of the people of NSW. Roads and Maritime is making sure that
                        you have enough driving knowledge and experience to get a licence so that the of society is always save.
                    </p>
                    <p>Roads and Maritime has developed a Graduated Licensing Scheme to make sure
                        graduates have enough skill and knowledge when they are getting a licence.
                        Graduated Licensing Scheme is path way for licence seeker to safely build
                        experience on the road and improve driving skills as they move from a learner
                        to a full licence. It takes minimum 4 years to go though the whole process and get a full licence.</p>

                    <h3 class="universal-title">Steps from learner to full licence</h3>
                    <p>There are seven steps to progress from a learner to a full licence:</p>
                    <ul class="list-styles start0">
                        <li class="top10"><i class="fa blue-circle">1</i>Pass the Driver Knowledge Test (DKT) – get your learner licence</li>
                        <li><i class="fa blue-circle">2</i>Hold your learner licence for at least 12 months, and complete 120 hours of
                            supervised driving practice, including 20 hours of night driving (unless you’re 25 or older)</li>
                        <li><i class="fa blue-circle">3</i>Pass the Driving Test – get your provisional P1 (red) licence</li>
                        <li><i class="fa blue-circle">4</i>Hold your P1 licence for at least 12 months</li>
                        <li><i class="fa blue-circle">5</i>Pass the Hazard Perception Test (HPT) – get your provisional P2 (green) licence</li>
                        <li><i class="fa blue-circle">6</i>Hold your P2 licence for at least two years (24 months)</li>
                        <li><i class="fa blue-circle">7</i>Pass the Driver Qualification Test (DQT) – get your full licence.</li>
                    </ul>
                    <h3 class="universal-title">Converting an overseas or interstate licence to a NSW equivalent</h3>
                    <p>If you’re moving to NSW from another part of Australia or another country, you’ll need to
                        get a NSW driver or rider licence. You can use your existing licence for up to
                        three months, but after that you must have a NSW licence.</p>
                    <h3 class="universal-title">Interstate drivers</h3>
                    <p>If you move to NSW from any Australian state or territory and hold
                        a current licence you can be issued a NSW equivalent licence.
                        Your licence will be converted in line with the NSW Graduated
                        Licensing Scheme. You will need to meet the requirements to progress
                        through each stage. To know more, please visit <a target="_blank" href="http://www.rms.nsw.gov.au/roads/licence/moving-to-nsw.html">Roads and Maritime</a>.</p>
                    <h3 class="universal-title">International drivers</h3>
                    <p>If you’re a permanent Australian resident, or hold a permanent visa under
                        the Commonwealth Migration Act 1958, and you intend to stay in NSW, you are
                        not considered to be a visitor. You can drive in NSW on a current overseas licence
                        for a maximum of three months. Then you will need to apply for a NSW licence to
                        continue driving. To know more, please visit <a target="_blank" href="http://www.rms.nsw.gov.au/roads/licence/moving-to-nsw.html">Roads and Maritime</a>.</p>

                    <br />
                    <div class="big-message message-white b-radius5">
                        <i class="fa fa-bell">&nbsp;</i>
                        <h6>References</h6>
                        <p><a target="_blank" href="http://www.rms.nsw.gov.au/">Roads and Maritime</a> </p>
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