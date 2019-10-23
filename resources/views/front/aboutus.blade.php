@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')

<section class="breadcrumb_area">
        <img class="breadcrumb_shap" src="img/breadcrumb/banner_bg.png" alt="">
        <div class="container">
            <div class="breadcrumb_content text-center">
                <h1 class="f_p f_700 f_size_50 w_color l_height50 mb_20">About us</h1>
                <p class="f_400 w_color f_size_16 l_height26"><br> </p>
            </div>
        </div>
</section>
<section class="agency_service_area bg_color">
        <div class="container">
            @php
                print_r($site_setting->ws_about_us);
            @endphp
        </div>
</section>

@endsection