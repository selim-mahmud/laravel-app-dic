@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
@stop

@push('scripts_stack')

@endpush

@section('header')
    @include('_partials.header_control')
@stop

@section('left_sidebar')
    @include('_partials.left_sidebar_school')
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
            <a class="mag_modal btn btn-primary" data-effect="mfp-zoomIn" href="#photo_form">Add New image</a>
            <span class="text-danger">{{$errors->first('photo')}}</span>
            <br/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">List of images</span>
                </div>
                <div style="padding: 20px 0;" class="panel-body">
                    @if(!$schoolMedias->isEmpty())
                        <div class="row">
                            @foreach($schoolMedias as $schoolMedia)
                                <div class="col-md-3 col-sm-6">
                                    <a style="background-color: #F04D4E; color: #FFF; padding:0 7px; position: absolute; right:15px"
                                       href="{{url('/school/medias/delete', [$schoolMedia->id])}}"
                                       onClick="javascript: return confirm('Are you sure to delete!');">
                                        <i class="fa fa-times" aria-hidden="true"></i></a>
                                    <img style="margin-bottom:30px;" width="100%" height="220" src="{{asset($schoolMedia->url)}}" alt="image">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h4>No image has been added. Please add using add button above.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="photo_form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
        <div class="panel">
            <div class="panel-heading"><span class="panel-title">Upload new image</span></div>
            {!! Form::open (['method'=>'POST', 'action'=> 'SchoolMediaController@store', 'files' => true]) !!}
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
                        <button type="submit" class="button btn-primary">Upload image</button>
                    </div>
                </div>
            </div>
            <div class="panel-footer"></div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
@push('scripts_stack')

@endpush