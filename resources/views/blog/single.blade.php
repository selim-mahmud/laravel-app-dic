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
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 top60">
                    <article>
                        <div class="first-post">
                            <div class="first-pict">
                                <img src="{{asset($publishedPost->feature_image)}}" alt="{{$publishedPost->title}}">
                                <div class="pict-data uppercase">{{$publishedPost->created_at}}</div>
                            </div>
                            <div class="font22 color333 extrabold uppercase top30">{{$publishedPost->title}}</div>
                            <div class="f-left p-right20">
                                <ul class="list-styles new-first-det start0 f-left top10">
                                    <li><a href="#"><i class="fa fa-user">
                                                &nbsp;</i>{{$publishedPost->user->display_name}}</a></li>
                                </ul>
                            </div>
                            <div class="f-left">
                                <ul class="list-styles new-first-det start0 f-left top10">
                                    <li><a href="#"><i class="fa fa-share-alt">&nbsp;</i>share</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div class="s-row-line margin10"></div>
                            <div class="color777">
                                {!! $publishedPost->body !!}
                            </div>
                        </div>
                    </article>
                    <div class="clearfix"></div>
                </div>

                <div style="margin-top: 10px" class="col-sm-3">
                    @include('_partials.post_categories')
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
@stop

@section('footer')
    @include('_partials.footer');
@stop

@push('scripts_stack')

@endpush