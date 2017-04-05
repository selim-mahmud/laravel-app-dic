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
    @include('_partials.left_sidebar_staff')
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
                    <span class="panel-title">List of all reviews</span>
                    <div class="btn-group pull-right">
                        <a href="{{url('staff/reviews/rejected')}}" class="btn btn-danger pull-right">Rejected</a>
                        <a href="{{url('staff/reviews/approving')}}" class="btn btn-warning pull-right">Approving</a>
                        <a href="{{url('staff/reviews/approved')}}" class="btn btn-success pull-right">Approved</a>
                    </div>
                </div><div class="clearfix"></div>
                <div style="padding: 20px 0;" class="panel-body">
                    @if(!$reviews->isEmpty())
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>School Name</th>
                                    <th>Learner Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{$review->school->name}}</td>
                                        <td>{{$review->user->name}}</td>
                                        <td>{{$review->rating}}</td>
                                        <td>{{$review->comment}}</td>
                                        <td class="
                                                    @if($review->approved == 'Approved')
                                        {{'alert-success'}}
                                        @elseif($review->approved == 'Approving')
                                        {{'alert-warning'}}
                                        @else
                                        {{'alert-danger'}}
                                        @endif
                                                "><div >{{$review->approved}}</div></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $reviews->links() }}
                        </div>
                    @else
                        <h4>No reviews found.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts_stack')
@endpush