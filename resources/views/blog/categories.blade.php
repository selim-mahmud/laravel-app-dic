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
    @include('_partials.footer');
@stop

@push('scripts_stack')

@endpush