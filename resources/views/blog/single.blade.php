@extends('layouts.main')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">

    <meta property="og:url"           content="{{url(request()->path())}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$publishedPost->title}}" />
    <meta property="og:description"   content="{{$publishedPost->excerpt}}" />
    <meta property="og:image"         content="{{asset($publishedPost->feature_image)}}" />
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
                                    <li><i class="fa fa-user">
                                                &nbsp;</i>{{$publishedPost->user->display_name}}</li>
                                </ul>
                            </div>
                            <div class="f-left p-right20">
                                <ul class="list-styles new-first-det start0 f-left top10">
                                    <li><a href="{{url('blog/categories', [str_slug($publishedPost->category->name)])}}"><i class="fa fa-list"></i>{{$publishedPost->category->name}}</a> </li>
                                </ul>
                            </div>
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=258284101215362";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="f-left fb-share-button" data-href="{{url(request()->path())}}"
                                 data-layout="button_count" data-size="small" data-mobile-iframe="true">
                                <ul class="list-styles new-first-det start0 f-left top10">
                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url(request()->path())}}&src=sdkpreparse"><i class="fa fa-facebook">&nbsp;</i>share</a></li>
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
    @include('_partials.footer')
@stop

@push('scripts_stack')

@endpush