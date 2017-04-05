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
            <a class="mag_modal btn btn-primary" data-effect="mfp-zoomIn" href="#service_form">Add New</a>
            <span class="text-danger">{{$errors->first('service')}}</span>
            <br/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">List of services</span>
                </div>
                <div style="padding: 20px 0;" class="panel-body">
                    @if(!$schoolServices->isEmpty())
                        @foreach($schoolServices as $schoolService)
                            <span style="padding:20px 15px; font-size: 18px;"
                                  class="tm-tag tm-tag-info"><span>{{$schoolService->name}}</span>
                                <a style="margin-left: 15px;" onClick="javascript: return confirm('Are you sure to delete!');"
                                   href="{{url('/school/services/delete', [$schoolService->pivot->school_id, $schoolService->pivot->service_id])}}" class="tm-tag-remove">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a></span>
                        @endforeach
                    @else
                        <h4>No services have been added. Please add using add button above.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="service_form" class="popup-basic allcp-form mfp-hide">
        <div class="panel">
            <div class="panel-heading"><span class="panel-title">Add your services</span></div>
            {!! Form::open (['method'=>'POST', 'action'=> 'SchoolServiceController@store']) !!}
            <div class="panel-body ph15">
                <div class="section row mhn10">
                    <div class="col-md-12 ph15">
                        <label for="service" class="field">
                            <select id="service" name="service" class="form-control">
                                <option value="">Select your service</option>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <div class="section row mhn10">
                    <div class="col-md-12 ph15">
                        <button type="submit" class="button btn-primary">Add service</button>
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