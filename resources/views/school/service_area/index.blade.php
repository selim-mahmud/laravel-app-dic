@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
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
            <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="panel-title">Set your service area</span>
                        </div>
                        <div class="panel-body allcp-form">
                            {!! Form::open (['method'=>'POST', 'action'=> 'SchoolServiceAreaController@saveServiceArea']) !!}
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <label style="color:#999">Select state:</label>
                                       <select style="width:100%" id="state" name="state" class="form-control">
                                           <option value="">Select state</option>
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
            <br/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Your services area</span>
                </div>
                <div class="panel-body">
                    @if(!$schoolServiceAreas->isEmpty())
                        @foreach($schoolServiceAreas as $schoolServiceArea)
                            <div style="width:173px; height:80px; background:#F1F3FA; margin:10px 10px 10px 0; text-align: center; float:left; position: relative;">
                                <a style="background-color: #F04D4E; color: #FFF; font-size: 12px; padding:0 4px; position: absolute; right:0"
                                   href="{{url('/school/service-area/delete', [$schoolServiceArea->id])}}"
                                   onClick="javascript: return confirm('Are you sure to delete!');">
                                    <i class="fa fa-times" aria-hidden="true"></i></a>
                                <div style="position: relative; height: 40px; padding:7px; top: 50%; transform: translateY(-50%);">{{$schoolServiceArea->postcode->suburb}}</div>
                            </div>
                        @endforeach
                    @else
                        <h4>No service area added. Please add using add button above.</h4>
                    @endif
                </div>
            </div>
        </dv>
    </div>
@stop
@push('scripts_stack')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}
    <script type="text/javascript">
        $("#suburb").select2({
            placeholder: 'Select suburb',
            allowClear: true
        });
        $('#state').change(function(){
            var request = $.ajax({
                url: '/school/service-area/get-postcodes/'+$(this).val(),
                method: 'get'
            });
            request.done( function (data) {
                $.each(data, function (i, val) {
                    $('#suburb').append($('<option>', {value: val, text: i}));
                });
            });
            request.fail(function (data) {
                alert('An error occurred. Please try again later. (E072)');
            });
        })
    </script>
@endpush