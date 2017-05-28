@extends('layouts.main')
@section('meta')
    <title>Login as driving instructor or learner - Australian Driving Instructors Directory</title>
    <meta name="description" content="Login as driving instructor to setup your profile page or login as
learner to view profile of australian driving instructor">
    <meta name="keywords" content="australian driving instructors, find driving instructor, login">
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
    {!! getRatingSchemaCodeInJson(5, 120) !!}
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2 class="form-header black333">LOG IN</h2>
                        {!! Form::open (['method'=>'POST', 'action'=> 'UserController@postLogin']) !!}
                        <div class="form-group">
                            {!! Form::text('email', null, ['class'=>'form-1-style2 border1 borderddd p-right0 b-radius3', 'placeholder'=>'Your email']) !!}
                            <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                        </div>
                        <div class="form-group">
                            {!! Form::password('password', ['class'=>'form-1-style2 border1 borderddd p-right0 b-radius3', 'placeholder'=>'Your password' ]) !!}
                            <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span>
                        </div>
                        <div class="top20 checkbox checkbox-1">
                            {!! Form::checkbox('remember', '1', true, ['id' => 'remember']) !!}
                            <label for="remember">Remember me</label>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Login', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
                        </div>
                        {!! Form::close() !!}
                        <a class="readmore-btn b-radius3 color777" href="{{url('password-reset')}}">Forgot password</a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2 class="form-header black333">&nbsp;</h2>
                        <img class="img-responsive" src="{{asset('img/theme/how-it-works.jpg')}}" alt="user login">
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

@endpush