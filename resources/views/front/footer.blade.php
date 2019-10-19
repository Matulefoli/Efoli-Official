
    <footer class="footer_area footer_three">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="f_widget company_widget">
                                <a  href="{{url('/')}}" class="f-logo">
                                    <img src="{{asset($site_setting->ws_footer_icon)}}" width="200px" style="border-radius:10%" alt="logo">
                                </a>
                                <p class="f_400 f_p f_size_15 mb-0 l_height28 mt_30">
                                      @php
                                          print_r($site_setting->ws_footer_text);
                                      @endphp
                                </p>
                                <div class="social_icon">
                                    <a href="#" class="ti-facebook"></a>
                                    <a href="#" class="ti-twitter-alt"></a>
                                    <a href="#" class="ti-vimeo-alt"></a>
                                    <a href="#" class="ti-pinterest"></a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-6 col-md-6 col-sm-6 offset-3">
                            <div class="f_widget about-widget">
                                <h3 class="f-title f_600 f_size_18 mb_40">Team Solutions</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Team</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="mb-0 f_400">Copyright <?php echo date('Y'); ?> @<a href="#">{{$site_setting->ws_copy_right}}</a></p>
                        </div>
                        <div class="col-lg-6">
                            <ul class="f_menu text-right list-unstyled">
                                <li><a href="{{url('about_us')}}">About us</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        