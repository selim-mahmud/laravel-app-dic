<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    @yield('meta')

    <link rel="icon" type="image/x-icon" href="{{asset('img/theme/fav.png')}}"/>

    @stack('styles_stack')

    @include('_partials.control_styles')
    {{-- Separate out the hackfiles --}}
    @include('_partials.browserhacks')
</head>
<body>
<div id="main">
    @yield('header')
    @yield('left_sidebar')
    <section id="content_wrapper">
        <section id="content">
            <div style="max-width:1170px;">
                @yield('breadcrumb')
                @yield('flash_message')
                @yield('content')
            </div>
        </section>
        @yield('footer')
    </section>
</div>
@include('_partials.control_scripts')
@stack('scripts_stack')

</body>
</html>