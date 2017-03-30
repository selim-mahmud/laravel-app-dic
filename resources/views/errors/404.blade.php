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
    <br/>

    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="not-found-title margin60">
                        <span class="color555 extrabold">OOPS!!!</span> <b class="color333">The Page Not found</b>
                    </div>
                    <div class="error404">
                        <span class="error-blue">404</span><br/>
                        <span class="error-orange">ERROR</span>
                    </div>
                    <div class="text-center color777 top40 font14">
                        The page you are looking for might have been removed, has its name changed or is temporarily
                        unavailable
                    </div>
                    <div class="row s-row-line margin60">
                    </div>
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