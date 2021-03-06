<!doctype html>
<html lang="en">
<head>
    @include("commons._metaInfo")
    {{--<link rel="stylesheet" href="/css/app.css">--}}
    {{--<link rel="stylesheet" href="/css/font-awesome.css">--}}
    {{--<link rel="stylesheet" href="/css/select2.min.css">--}}
    {{--<link rel="stylesheet" href="/css/sweetalert.css">--}}
    {{--<link rel="stylesheet" href="/css/custom.css">--}}
    {{--<link rel="stylesheet" href="/css/socialMediaFontsFamily.css">--}}
    {{--<link rel="stylesheet" href="/css/searchBar.css">--}}
    <link rel="stylesheet" href="/css/nationpolls.css">
    {{--<script type="text/javascript"src="/js/jquery-1.12.3.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/jquery-ui.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/bootstrap.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/jquery.timer.js"></script>--}}
    {{--<script type="text/javascript" src="/js/timer.js"></script>--}}
    {{--<script type="text/javascript" src="/js/moment.js"></script>--}}
    {{--<script type="text/javascript" src="/js/select2.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/sweetalert.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/socialIcons.js"></script>--}}
    {{--<script type="text/javascript" src="/js/fingerprint.js"></script>--}}
    {{--<script type="text/javascript" src="/js/custom.js"></script>--}}
    <script type="text/javascript" src="/js/nationpolls.js"></script>
</head>
<body>
@include('analyticstracking._analyticstracking')
@include('_navbar')
<div class="container">
    <div class="row" id="mainRow">
        @include('flash::message')
        @yield('pollToday')
        @yield('recentUpdates')
        @yield('createPollForm')
        @yield('similar')
        {{--@yield('aboutUs')--}}
        @yield('registerUser')
        @yield('login')
        @yield('resetPassword')
    </div>
    <div class="push"></div>
</div>
@include('commons._footer')
</body>
<script>
    $('#flash-overlay-modal').modal();
//    $(document).ready(function(){
//        $(".myBtn").click(function(){
//            $("#myModal").modal({backdrop:'static',keyboard:false});
//        });
//    });
</script>
</html>