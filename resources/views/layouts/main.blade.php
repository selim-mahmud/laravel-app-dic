<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    @yield('meta')

    <link rel="icon" type="image/x-icon" href="{{asset('img/theme/fav.png')}}"/>

    @include('_partials.common_styles')
    {{-- Separate out the hackfiles --}}
    @include('_partials.browserhacks')
</head>
<body>

@yield('header')

<section>

    @yield('breadcrumb')

    @yield('flash_message')

    @yield('content')

</section>

@yield('footer')
@include('_partials.common_scripts')
@stack('scripts_stack')

</body>
</html>