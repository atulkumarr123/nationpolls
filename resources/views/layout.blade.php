<!doctype html>
<html lang="en">
<head>
    @include("_metaInfo")
    <title>Nation Polls</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    {{--<link rel="stylesheet" href="/css/select2.min.css">--}}
    {{--<link rel="stylesheet" href="/css/sweetalert.css">--}}
    {{--<link rel="stylesheet" href="/css/subscription.css">--}}
    <link rel="stylesheet" href="/css/custom.css">
    {{--<link rel="stylesheet" href="/css/bar.css">--}}
    {{--<link rel="stylesheet" href="/css/material-charts.css">--}}
    {{--<link rel="stylesheet" href="/css/socialMediaFontsFamily.css">--}}
    {{--<link rel="stylesheet" href="/css/fromGulp/carouselModeToListArticles.css">--}}
    <link rel="stylesheet" href="/css/searchBar.css">
    {{--<link rel="stylesheet" href="/css/authPages.css">--}}
    {{--<link rel="stylesheet" href="/css/atulyaperspectives.css">--}}
    {{--<script type="text/javascript" src="/js/atulyaPerspectives.js"></script>--}}

    <script type="text/javascript"src="/js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/js/jquery.timer.js"></script>
    <script type="text/javascript" src="/js/timer.js"></script>
    <script type="text/javascript" src="/js/moment.js"></script>
    {{--<script type="text/javascript"--}}
            {{--src="/js/select2.min.js">--}}
    {{--</script>--}}
    {{--<script--}}
            {{--type="text/javascript"--}}
            {{--src="/js/sweetalert.min.js">--}}
    {{--</script>--}}
    {{--<script type="text/javascript"--}}
            {{--src="/js/customJs/socialIcons.js"></script>--}}
    {{--<script--}}
            {{--type="text/javascript"--}}
            {{--src="/js/customJs/searchBar.js">--}}
    {{--</script>--}}
    <script type="text/javascript" src="/js/custom.js"></script>
    {{--<script--}}
            {{--type="text/javascript"--}}
            {{--src="/js/customJs/subscription.js">--}}
    {{--</script>--}}

</head>
<body>

@include('_navbar')
<div class="container">
    <div class="row" id="mainRow">
{{--        @include('flash::message')--}}
        @yield('pollToday')
        {{--@yield('article')--}}
        @yield('recentUpdates')
        {{--@yield('similar')--}}
        {{--@yield('aboutUs')--}}
        {{--@yield('registerUser')--}}
        {{--@yield('login')--}}
        {{--@yield('resetPassword')--}}
        {{--@yield('home')--}}
        {{--@include('ads._adplaceholder')--}}
        {{--@include('miscellaneous._subscribeForm')--}}
    </div>
</div>
{{--@include('commons._footer')--}}
</body>
{{--@yield('addDivScript')--}}
</html>