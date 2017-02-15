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
                        {!! Form::close() !!}<br />
                        <a style="margin-top:20px;" href="{{url('password-reset')}}">Forgot password</a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2 style="margin-top: 20px;" class="centerBlock form-header black333"><span
                                    class="primary_color">OR</span> login using your facebook</h2>
                        <a class="b-radius3 btn-social btn-fb centerBlock button-blue"
                           href="{{url('facebook-auth')}}"><span class="fa fa-facebook"></span> Login with Facebook</a>
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
    @include('_partials.footer');
@stop

@push('scripts_stack')
{{-- <script src="js/head_script_example.js"></script> --}}
@endpush