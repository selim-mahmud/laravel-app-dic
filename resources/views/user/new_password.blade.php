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
                        <h2 class="form-header black333">Set new password</h2>
                        {!! Form::open (['method'=>'POST', 'action'=> 'UserController@postNewPassword']) !!}
                        {!! Form::hidden('key', $key) !!}
                        <div class="top20">
                            {!! Form::password('password', ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'New password']) !!}
                            <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span>
                        </div>
                        <div class="top20">
                            {!! Form::password('confirm_password', ['class'=>'border1 borderddd form-1-style2 b-radius3', 'placeholder'=>'Confirm new password']) !!}
                            <span class="text-danger">{{$errors->has('confirm_password')?$errors->first('confirm_password'):''}}</span>
                        </div>
                        <div class="top20">
                            {!! Form::submit('Set new password', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
                        </div>
                        {!! Form::close() !!}<br />
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