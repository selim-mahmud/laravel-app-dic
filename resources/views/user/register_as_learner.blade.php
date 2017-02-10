@extends('layouts.main')

@section('meta')
    <title>Register as a learner - Driving Instructors Directory</title>
    <meta name="description" content="Register yourself as a learner, search our database to find your nearest driving instructors and school. Get driving lesson and write a review for your instructors">
    <meta name="keywords" content="register, driving learner, nearest driving instructors">
@stop

@section('header')
    @include('partials.header')
@stop

@section('breadcrumb')
    @include('partials.breadcrumb')
@stop

@section('flash_message')
    @include('partials.flash_message')
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2 class="form-header black333">Register as a learner</h2>

                        {!! Form::open (['method'=>'POST', 'action'=> 'UserController@postLearnerRegistration']) !!}

                        <div class="top20">
                            {!! Form::text('name', null, ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Your name']) !!}
                        </div>
                        <div class="top20">
                            {!! Form::text('display_name', null, ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Your display name']) !!}
                        </div>
                        <div class="top20">
                            {!! Form::email('email', null, ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Your email']) !!}
                        </div>
                        <div class="top20">
                            {!! Form::password('password', ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Password']) !!}
                        </div>
                        <div class="top20">
                            {!! Form::password('confirm_password', ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Confirm password']) !!}
                        </div>
                        <div class="top20">
                            {!! Form::submit('REGISTER', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
                        </div>

                        {!! Form::close() !!}

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2 style="margin-top: 20px;" class="centerBlock form-header black333"><span
                                    class="primary_color">OR</span> register using your facebook</h2>

                        <a class="b-radius3 btn-social btn-fb centerBlock button-blue"
                           href="{{url('facebook-register')}}"><span class="fa fa-facebook"></span> Register with
                            Facebook</a>

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
    @include('partials.footer');
@stop

@push('scripts_stack')
{{-- <script src="js/head_script_example.js"></script> --}}
@endpush