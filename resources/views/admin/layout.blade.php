<!DOCTYPE html>
<html lang="en">
<head>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                
                <meta name="description" content="{{$meta_data->description}}"/>
                <meta name="author" content="{{$meta_data->author}}" />
                <meta http-equiv="expires" content="{{$meta_data->expires}}"/>
                <title>{{$pageTitle}}</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
                <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
               
               
                
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/vendors/css/vendors.min.css')}}">
               
                
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/bootstrap.min.css')}}">
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/bootstrap-extended.min.css')}}">
                {{-- <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/colors.min.css')}}"> --}}
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/components.min.css')}}">
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/themes/dark-layout.min.css')}}">
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/themes/semi-dark-layout.min.css')}}">
                <!-- END: Theme CSS-->
            
                <!-- BEGIN: Page CSS-->
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/app-assets/css/pages/authentication.css')}}">
                <!-- END: Page CSS-->
               
                <!-- BEGIN: Custom CSS-->
                <link rel="stylesheet" type="text/css" href="{{asset('back-asset/assets/css/style.css')}}">

            
                
                                                                                                                                                 
            </head>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        @include('admin.header')  
        <div class="app-content content">
                @include('session_notification')
             <div class="content-wrapper">
                 @yield('content')
             </div>
        </div>
        
        <script src="{{asset('back-asset/app-assets/vendors/js/vendors.min.js')}}"></script>
        {{-- <script src="{{asset('back-asset/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
             <script src="{{asset('back-asset/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script> --}}
        {{-- <script src="{{asset('back-asset/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>  --}}
        
        <script src="{{asset('back-asset/app-assets/js/scripts/configs/vertical-menu-light.min.js')}}"></script>
        <script src="{{asset('back-asset/app-assets/js/core/app-menu.min.js')}}"></script>
        <script src="{{asset('back-asset/app-assets/js/core/app.min.js')}}"></script>
        <script src="{{asset('back-asset/app-assets/js/scripts/components.min.js')}}"></script>
        {{-- <script src="{{asset('back-asset/app-assets/js/scripts/footer.min.js')}}"></script> --}}
        <script src="{{asset('fontawesome/js/all.js')}}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
        @yield('script')
</body>
</html>