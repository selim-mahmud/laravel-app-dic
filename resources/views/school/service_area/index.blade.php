@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@push('styles_stack')
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css') }}
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="panel-title">Set your service area</span>
                        </div>
                        <div class="panel-body allcp-form">
                            {!! Form::open (['method'=>'POST', 'action'=> 'SchoolServiceAreaController@index']) !!}
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <label style="color:#999">Select state:</label>
                                       <select style="width:100%" id="state" name="state" class="form-control">
                                           @foreach($states as $state)
                                               <option value="{{$state->id}}">{{$state->name}}</option>
                                           @endforeach
                                       </select>
                                       <span class="text-danger">{{$errors->first('state')}}</span>
                                   </div>
                               </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <label style="color:#999">Select suburb (you can select multiple):</label>
                                    <select style="width:100%" id="suburb" name="suburb[]" class="form-control" multiple="multiple">
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('suburb')}}</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button btn-primary">Add service area</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Your services area</span>
                </div>
                <div style="padding: 20px 0;" class="panel-body">

                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts_stack')
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}
<script type="text/javascript">
    $("#suburb").select2({
        placeholder: 'Select suburb',
        allowClear: true
    });
</script>
@endpush