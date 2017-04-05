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
    {!! getRatingSchemaCodeInJson(5, 24) !!}
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 top40">
                    <article>
                        @include('_partials.post_categories')
                    </article>
                    <div class="clearfix"></div>
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