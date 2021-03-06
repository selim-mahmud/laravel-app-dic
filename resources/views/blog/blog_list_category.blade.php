@extends('layouts.main')

@section('meta')
    <title>Blog Category - Australian Driving Instructors Directory</title>
    <meta name="description" content="driving licence in New South Wales, driving instructors, driving school, learner driver, driving lesson, blog category">
    <meta name="keywords" content="driving licence in New South Wales, driving instructors, driving school, learner driver, driving lesson">
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
    {!! getRatingSchemaCodeInJson(4.8, 37) !!}
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 top60">
                    @if(!$publishedPosts->isEmpty())
                        @foreach($publishedPosts as $publishedPost)
                            <article>
                                <div class="first-post">
                                    <div class="first-pict">
                                        <a href="{{url('blog', [$publishedPost->slug])}}"><img src="{{asset($publishedPost->feature_image)}}"
                                                                                               alt="{{$publishedPost->title}}"></a>
                                        <div class="pict-data uppercase">{{$publishedPost->created_at}}</div>
                                    </div>
                                    <h2 class="font22 color333 extrabold uppercase top30"><a href="{{url('blog', [$publishedPost->slug])}}">{{$publishedPost->title}}</a></h2>
                                    <div class="f-left p-right20">
                                        <ul class="list-styles new-first-det start0 f-left top10">
                                            <li><a href="#"><i class="fa fa-user">
                                                        &nbsp;</i>{{$publishedPost->user->display_name}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="f-left p-right20">
                                        <ul class="list-styles new-first-det start0 f-left top10">
                                            <li><a href="{{url('blog/categories', [str_slug($publishedPost->category->name)])}}"><i class="fa fa-list"></i>{{$publishedPost->category->name}}</a> </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="color777">
                                        {{$publishedPost->excerpt}}
                                        <div class="">
                                            <a href="{{url('blog', [$publishedPost->slug])}}">
                                                <div class="readmore-btn b-radius3 color777 top20 uppercase">read more
                                                    <i
                                                            class="fa fa-angle-double-right"
                                                            style="margin-left: 5px;"></i>
                                                </div>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <br/><br/>
                        @endforeach
                        {{ $publishedPosts->links() }}
                    @else
                        <h2>No blog post found.</h2>
                    @endif
                </div>

                <div style="margin-top: 10px" class="col-sm-3">
                    @include('_partials.post_categories')
                </div>
            </div>
        </div>
    </div>
    <br/>
@stop

@section('footer')
    @include('_partials.footer')
@stop

@push('scripts_stack')

@endpush