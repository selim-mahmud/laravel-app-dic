@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
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
            <div style="min-height:700px; padding:20px 0;">
                <a class="btn btn-primary" href="{{ action('StaffPostController@index') }}">Go back</a>
                <br/>
                <br/>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="panel-title">Post details</span>
                    </div>
                    <div class="panel-body">
                        <table id="user" class="table table-bordered table-striped" style="clear: both">
                            <tbody>
                            <tr>
                                <td style="width: 35%;">Title</td>
                                <td style="width: 65%;">{{$post->title}}</td>
                            </tr>
                            <tr>
                                <td>Excerpt</td>
                                <td>{{$post->excerpt}}</td>
                            </tr>
                            <tr>
                                <td>Body</td>
                                <td>{!! $post->body !!}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>
                                    @if($post->feature_image != '')
                                        <img width="1000" src="{{asset($post->feature_image)}}" alt="feature image">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{$post->category->name}}</td>
                            </tr>
                            <tr>
                                <td>Published?</td>
                                <td>{{$post->published}}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>{{$post->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Updated at</td>
                                <td>{{$post->updated_at}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts_stack')

@endpush