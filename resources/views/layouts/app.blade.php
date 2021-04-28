<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ShopiLara</title>

    <link rel="stylesheet" type="text/css" href="{{asset('ressources/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ressources/css/shop-homepage.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('ressources/vendor/fontawesome/css/all.css') }}"/>
</head>
<body>

<!-- Navigation -->
@include('layouts.navbars.nav')
<!-- Page Content -->
<div class="container">

    <div class="row">

    @include('layouts.navbars.sidebar')
    <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            @yield('carousel')
            @yield('content')
        </div>
    </div>
</div>



<!-- Footer -->
@include('layouts.footers.footer')
<!-- /.container -->




{{--    <div class="main-content">--}}
{{--            @include('layouts.navbars.sidebar')--}}
{{--            @include('layouts.navbars.nav')--}}
{{--            @include('content')--}}
{{--        </div>--}}

{{--        @guest()--}}
{{--            @include('layouts.footers.guest')--}}
{{--        @endguest--}}

<!-- Bootstrap core JavaScript -->
<script src="{{asset('ressources/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('ressources/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
