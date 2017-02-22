@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@push('scripts_stack')

@endpush

@section('header')
    @include('_partials.header_control')
@stop

@section('left_sidebar')
    @include('_partials.left_sidebar_learner')
@stop

@section('breadcrumb')
    @include('_partials.breadcrumb_control')
@stop

@section('flash_message')
    @include('_partials.control_flash_message')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">Your details</span>
                </div>
                <div class="panel-body">
                    <table id="user" class="table table-bordered table-striped" style="clear: both">
                        <tbody>
                        <tr>
                            <td style="width: 35%;">Profile photo</td>
                            <td style="width: 65%;">
                                @if(Auth::user()->profile_photo_url)
                                    <img height="70" width="80" src="{{Auth::user()->profile_photo_url}}" alt="profile photo" />
                                @else
                                    <img height="80" width="80" src="{{asset(config('dic.default_learner_profile_photo'))}}" alt="profile photo" />
                                @endif
                                &nbsp; &nbsp; <a href="#photo-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a>
                                <span class="text-danger">{{$errors->has('photo')?$errors->first('photo'):''}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                {{Auth::user()->name}} &nbsp; &nbsp;
                                <a href="#name-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
                                <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Display name</td><td>
                                {{Auth::user()->display_name}}
                                &nbsp; &nbsp; <a href="#display-name-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
                                <span class="text-danger">{{$errors->has('display_name')?$errors->first('display_name'):''}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td><td>
                                {{Auth::user()->email}}
                                &nbsp; &nbsp; <a href="#email-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
                                <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                            </td>
                        </tr>
                        @if(Auth::user()->facebook_id === 0)
                            <tr>
                                <td>Password</td>
                                <td>
                                    ***************
                                    &nbsp; &nbsp; <a href="#password-form" data-effect="mfp-zoomIn" class="mag_modal btn btn-xs btn-default">Change</a><br />
                                    <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span><br />
                                    <span class="text-danger">{{$errors->has('confirm_password')?$errors->first('confirm_password'):''}}</span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                    <div id="photo-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
                        <div class="panel">
                            <div class="panel-heading"><span class="panel-title">Upload new photo</span></div>
                            {!! Form::open (['method'=>'POST', 'action'=> 'LearnerProfileController@postChangePhoto', 'files' => true]) !!}
                            <div class="panel-body ph15">
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <label class="field prepend-icon file file-fw">
                                            <span class="button btn-info">Choose File</span>
                                            <input class="gui-file" name="photo" id="photo" onchange="document.getElementById('uploader').value = this.value;" type="file">
                                            <input class="gui-input" id="uploader" placeholder="File Select" type="text">
                                        </label>
                                    </div>
                                </div>
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <button type="submit" class="button btn-primary">Change</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div id="name-form" class="popup-basic allcp-form mfp-hide">
                        <div class="panel">
                            <div class="panel-heading"><span class="panel-title">Change your name</span></div>
                            {!! Form::open (['method'=>'POST', 'action'=> 'LearnerProfileController@postChangeName']) !!}
                            <div class="panel-body ph15">
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <label for="name" class="field">
                                            {!! Form::text('name', null, ['class'=>'gui-input', 'placeholder'=>'Enter your name']) !!}
                                        </label>
                                    </div>
                                </div>
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <button type="submit" class="button btn-primary">Change</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div id="display-name-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
                        <div class="panel">
                            <div class="panel-heading"><span class="panel-title">Change your display name</span></div>
                            {!! Form::open (['method'=>'POST', 'action'=> 'LearnerProfileController@postChangeDisplayName']) !!}
                            <div class="panel-body ph15">
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <label for="display_name" class="field">
                                            {!! Form::text('display_name', null, ['class'=>'gui-input', 'placeholder'=>'Enter your display name']) !!}
                                        </label>
                                    </div>
                                </div>
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <button type="submit" class="button btn-primary">Change</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div id="email-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
                        <div class="panel">
                            <div class="panel-heading"><span class="panel-title">Change your email</span></div>
                            {!! Form::open (['method'=>'POST', 'action'=> 'LearnerProfileController@postChangeEmail']) !!}
                            <div class="panel-body ph15">
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <label for="email" class="field">
                                            {!! Form::text('email', null, ['class'=>'gui-input', 'placeholder'=>'Enter your email']) !!}
                                            <b class="tooltip tip-right-top"><em>This means your login email will be changed too.</em></b>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row mhn10">
                                    <div class="col-md-12 ph15">
                                        <button type="submit" class="button btn-primary">Change</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @if(Auth::user()->facebook_id === 0)
                        <div id="password-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
                            <div class="panel">
                                <div class="panel-heading"><span class="panel-title">Change your password</span></div>
                                {!! Form::open (['method'=>'POST', 'action'=> 'LearnerProfileController@postChangePassword']) !!}
                                <div class="panel-body ph15">
                                    <div class="section row mhn10">
                                        <div class="col-md-12 ph15">
                                            <label for="password" class="field">
                                                {!! Form::password('password', ['class'=>'gui-input', 'placeholder'=>'Enter password']) !!}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="section row mhn10">
                                        <div class="col-md-12 ph15">
                                            <label for="confirm_password" class="field">
                                                {!! Form::password('confirm_password', ['class'=>'gui-input', 'placeholder'=>'Confirm password']) !!}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="section row mhn10">
                                        <div class="col-md-12 ph15">
                                            <button type="submit" class="button btn-primary">Change</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts_stack')

@endpush