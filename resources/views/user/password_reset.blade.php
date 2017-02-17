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
                        <h2 class="form-header black333">Password reset</h2>
                        {!! Form::open (['method'=>'POST', 'action'=> 'UserController@postPasswordReset']) !!}
                        <div class="form-group">
                            {!! Form::text('email', null, ['class'=>'form-1-style2 border1 borderddd p-right0 b-radius3', 'placeholder'=>'Your email']) !!}
                            <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Send reset link', ['class'=>'submit-btn button1-1 b-radius3 right30 button-blue top20']) !!}
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