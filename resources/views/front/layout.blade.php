<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{$site_setting->ws_logo}}" type="image/x-icon">
        <meta name="description" content="{{$meta_data->description}}"/>
        <meta name="author" content="{{$meta_data->author}}" />
        <meta http-equiv="expires" content="{{$meta_data->expires}}"/>
        <title>{{$pageTitle}}</title>
        <link rel="stylesheet" href="{{asset('front-asset/asset/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/themify-icon/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/elagent/style.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/flaticon/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/animation/animate.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/owl-carousel/assets/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/magnify-pop/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('front-asset/asset/css/responsive.css')}}">     
</head>
<body> 
    @yield('preloader')
    @include('front.header')
    @yield('content')
    @include('front.footer') 
    <script src="{{asset('front-asset/asset/bootstrap-selector/js/bootstrap-select.min.js')}}"></script>   
    <script src="{{asset('front-asset/asset/nice-select/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/multiscroll/jquery.easings.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/multiscroll/multiscroll.responsiveExpand.limited.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/multiscroll/jquery.multiscroll.extensions.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/js/propper.js')}}"></script>
    <script src="{{asset('front-asset/asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/wow/wow.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/sckroller/jquery.parallax-scroll.js')}}"></script>
    <script src="{{asset('front-asset/asset/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/isotope/isotope-min.js')}}"></script>
    <script src="{{asset('front-asset/asset/magnify-pop/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('front-asset/asset/js/plugins.js')}}"></script>
    <script src="{{asset('front-asset/asset/js/main.js')}}"></script>
    @yield('admin_script')
</body>
</html>