@extends('layouts.main')

@section('meta')
    <title>Contact us - Australian Driving Instructors Directory</title>
    <meta name="description" content="Contact us to know about our services of finding driving instructors or schools.">
    <meta name="keywords" content="Contact us, driving school, driving instructors, learners driver, driving lessons">
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
    {!! getRatingSchemaCodeInJson(4.2, 65) !!}
    <br/>
    <br/>
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="color333"><span class="extrabold uppercase bgfff p-right20">send message</span></h5>
                    <div id="success"></div>
                    {!! Form::open(['method' => 'post', 'action' => 'PageController@sendContactUs']) !!}
                        <div class="row">
                            <div class="col-sm-6 top20">
                                {!! Form::text('full_name', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Full Name *'])!!}
                                <span class="text-danger">{{$errors->first('full_name')}}</span>
                            </div>
                            <div class="col-sm-6 top20">
                                {!! Form::text('email', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Email Address *'])!!}
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                            <div class="col-sm-12 top20">
                                {!! Form::text('contact_number', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Contact number'])!!}
                                <span class="text-danger">{{$errors->first('contact_number')}}</span>
                            </div>
                            <div class="col-sm-12 top20">
                                {!! Form::text('subject', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Subject *'])!!}
                                <span class="text-danger">{{$errors->first('subject')}}</span>
                            </div>
                            <div class="col-sm-12 top20">
                                {!! Form::textarea('message', null, ['class' => 'border1 borderddd form-1-style2 border1 b-radius3', 'placeholder' => 'Your message *'])!!}
                                <span class="text-danger">{{$errors->first('message')}}</span>
                            </div>
                            <div class="col-sm-12 top20">
                                {!! app('captcha')->display() !!}
                                <span class="text-danger">{{$errors->first('g-recaptcha-response')}}</span>
                            </div>
                            <div class="col-sm-12">
                                {!! Form::submit('SUBMIT', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
                            </div>
                        </div><br/>
                    {!! Form::close() !!}
                </div>

                <div class="col-md-6">
                        <div style="height: 450px;" id="google_map"></div>
                    </h5>
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
<script>
    function initMap() {
        // Restyle
        var styles = [
            {
                featureType:"road",
                stylers:[
                    { hue: "#222222" },
                    { saturation: 0 },
                    { lightness: 0 },
                ]
            },{
                featureType:"landscape",
                stylers:[
                    { hue: "#222222" },
                    { saturation: 100 },
                    { lightness: 30 },
                ]
            },
            {
                featureType:"poi",
                stylers:[
                    { hue: "#F04D4E" },
                    { saturation: 0 },
                    { lightness: 5 },
                ]
            },
            {
                featureType: "water",
                stylers: [
                    { hue: "#00BFF3" },
                    { saturation: 0 },
                    { lightness: 0 },
                ]
            }
        ];
        var adelaide = {lat: -34.92577, lng: 138.599732};
        var map = new google.maps.Map(document.getElementById('google_map'), {
            zoom: 11,
            mapTypeId: 'roadmap',
            scrollwheel: false,
            mapTypeControl: false,
            disableDefaultUI:true,
            center: adelaide,
            styles: styles
        });
        var markerIcon = '{{asset('img/theme/google-marker.png')}}';
        var marker = new google.maps.Marker({
            position: adelaide,
            icon: markerIcon,
            map: map,
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{config('dic.google_map_api_key')}}&callback=initMap">
</script>
@endpush