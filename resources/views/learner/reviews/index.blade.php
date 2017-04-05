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
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="panel-title">Write a review</span>
                        </div>
                        <div class="panel-body allcp-form">
                            {!! Form::open (['method'=>'POST', 'action'=> 'ReviewController@reviewStore']) !!}
                                <div class="form-group">
                                    <label style="color:#999">Select a school:</label>
                                    <select style="width:100%" id="school" name="school" class="form-control">
                                        @foreach($schools as $key=>$name)
                                            <option value="{{$key}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('school')}}</span>
                                </div>
                                <div class="form-group">
                                    <label style="color:#999">Your rating:</label><div class="clearfix"></div>
                                    <span style="float:left" class="rating block">
                                          <input class="rating-input" id="r5" value="5" type="radio" name="rating" checked>
                                          <label class="rating-star" for="r5">
                                              <i class="fa fa-star"></i>
                                          </label>
                                          <input class="rating-input" id="r4" value="4" type="radio" name="rating">
                                          <label class="rating-star" for="r4">
                                              <i class="fa fa-star"></i>
                                          </label>
                                          <input class="rating-input" id="r3" value="3" type="radio" name="rating">
                                          <label class="rating-star" for="r3">
                                              <i class="fa fa-star"></i>
                                          </label>
                                          <input class="rating-input" id="r2" value="2" type="radio" name="rating">
                                          <label class="rating-star" for="r2">
                                              <i class="fa fa-star"></i>
                                          </label>
                                          <input class="rating-input" id="r1" value="1" type="radio" name="rating">
                                          <label class="rating-star" for="r1">
                                              <i class="fa fa-star"></i>
                                          </label>
                                    </span>
                                    <span class="text-danger">{{$errors->first('rating')}}</span>
                                </div>
                                <div class="form-group"><div class="clearfix"></div>
                                    <label style="color:#999">Your comment:</label>
                                    {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Write a comment'])!!}
                                    <span class="text-danger">{{$errors->first('comment')}}</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button btn-primary">Add Review</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Reviews written by you</span>
                </div>
                <div style="padding: 20px 0;" class="panel-body">
                    @if(!$reviews->isEmpty())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>School Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{$review->school->name}}</td>
                                        <td>{{$review->rating}}</td>
                                        <td>{{$review->comment}}</td>
                                        <td>{{$review->approved}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4>No review have been added. Please add using button above.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts_stack')
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}
<script type="text/javascript">
    $("#school").select2({
        placeholder: 'Select a school',
        allowClear: true
    });
</script>
@endpush