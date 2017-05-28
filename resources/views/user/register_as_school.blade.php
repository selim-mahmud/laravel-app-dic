@extends('layouts.main')

@section('meta')
    <title>Register as School or instructor - Australian Driving Instructors Directory</title>
    <meta name="description" content="Australian Driving instructor or owner of school can register here to add in our listing.
     Learner seeking driving lessons will find you easily">
    <meta name="keywords" content="driving school registration, driving instructor registration">
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
    {!! getRatingSchemaCodeInJson(4.5, 95) !!}
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2 class="form-header black333">Register as a driving school</h2>
                        {!! Form::open (['method'=>'POST', 'action'=> 'UserController@postSchoolRegistration']) !!}
                        <div class="top20">
                            {!! Form::text('name', null, ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Your name']) !!}
                            <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                        </div>
                        <div class="top20">
                            {!! Form::text('school_name', null, ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Driving school name']) !!}
                            <span class="text-danger">{{$errors->has('school_name')?$errors->first('school_name'):''}}</span>
                        </div>
                        <div class="top20">
                            {!! Form::email('email', null, ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Your email']) !!}
                            <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                        </div>
                        <div class="top20">
                            {!! Form::password('password', ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Password']) !!}
                            <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span>
                        </div>
                        <div class="top20">
                            {!! Form::password('confirm_password', ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Confirm password']) !!}
                            <span class="text-danger">{{$errors->has('confirm_password')?$errors->first('confirm_password'):''}}</span>
                        </div>
                        <div class="top20">
                            {!! app('captcha')->display() !!}
                            <span class="text-danger">{{$errors->first('g-recaptcha-response')}}</span>
                        </div>
                        <div>
                            {!! Form::submit('REGISTER', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2 class="form-header black333">&nbsp;</h2>
                        <img class="img-responsive" src="{{asset('img/theme/school-registration.jpg')}}"
                             alt="school registration">
                        <br/>
                        <br/>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br/>
@stop

@section('footer')
    @include('_partials.footer')
@stop

@push('scripts_stack')
{{-- <script src="js/head_script_example.js"></script> --}}
@endpush