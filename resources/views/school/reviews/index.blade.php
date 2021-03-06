@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
@stop

@push('styles_stack')

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
            <br/>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Reviews by your learner</span>
                </div>
                <div style="padding: 20px 0;" class="panel-body">
                    @if(!$reviews->isEmpty())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Learner Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{$review->user->name}}</td>
                                        <td>{{$review->rating}}</td>
                                        <td>{{$review->comment}}</td>
                                        <td>{{$review->approved}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4>No one reviewed your school yet.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts_stack')

@endpush