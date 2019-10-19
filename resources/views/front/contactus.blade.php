@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')
<section class="breadcrumb_area">
    <img class="breadcrumb_shap" src="img/breadcrumb/banner_bg.png" alt="">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h1 class="f_p f_700 f_size_50 w_color l_height50 mb_20">Contac Us</h1>
            <p class="f_400 w_color f_size_16 l_height26">Let us know what you are thinking about us <br> Any good review and idea will be treated worthfully </p>
        </div>
    </div>
</section>
    <section class="contact_info_area sec_pad bg_color">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 pr-0">
                        <div class="contact_info_item">
                            <h6 class="f_p f_size_20 t_color3 f_500 mb_20">Office Address</h6>
                            <p class="f_400 f_size_15">{{$site_setting->ws_location}}</p>
                        </div>
                        <div class="contact_info_item">
                            <h6 class="f_p f_size_20 t_color3 f_500 mb_20">Contact Info</h6>
                            <p class="f_400 f_size_15"><span class="f_400 t_color3">Phone:</span> <a href="tel:{{$site_setting->ws_phone}}">{{$site_setting->ws_phone}}</a></p>
                            <p class="f_400 f_size_15"><span class="f_400 t_color3">Fax:</span> <a href="tel:{{$site_setting->ws_fax}}">{{$site_setting->ws_fax}}</a></p>
                            <p class="f_400 f_size_15"><span class="f_400 t_color3">Email:</span> <a href="{{$site_setting->ws_email}}">{{$site_setting->ws_email}}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="contact_form">
                            <form action="{{route('contact_message')}}" class="contact_form_box" method="POST" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text_box">
                                            <input type="text" id="name" name="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group text_box">
                                            <input type="text" name="email" id="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text_box">
                                            <input type="text" id="subject" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text_box">
                                            <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter Your Message . . ."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn_three">Send Message</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

      

@endsection
@section('script')
<script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>
<script>
        grecaptcha.ready(function() {
            grecaptcha.execute('_reCAPTCHA_site_key_', {action: 'homepage'}).then(function(token) {
               ...
            });
        });
        </script>
@endsection