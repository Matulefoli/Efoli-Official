@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')
@php
$i=0;
$j=0;
@endphp
<section class="prototype_banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 d-flex align-items-center">
                    <div class="prototype_content">
                        <h2 class="f_size_40 f_700 t_color3 l_height50 pr_70 mb_20 wow fadeInLeft" data-wow-delay="0.3s">
                            @if(sizeof($dialouges)>$i)
                                {{$dialouges[$i]->title}}
                            @endif
                        </h2>
                        <p class="f_400 l_height28 mb_40 wow fadeInLeft" data-wow-delay="0.5s">
                            @if(sizeof($dialouges)>$i)
                                @php
                                    print_r($dialouges[$i]->text);
                                @endphp
                            @endif
                            @php
                                $i++;
                            @endphp
                        </p>
                        
                    </div>
                </div>
                <div class="col-lg-7">
                    @if(sizeof($gellaries)>$j)
                    <img class="protype_img wow fadeInRight" data-wow-delay="0.4s" width="700px" style="border-radius:5%" src="{{asset($gellaries[$j]->image)}}" alt="">
                    @endif
                    @php
                        $j++;
                    @endphp
                </div>
            </div>
        </div>
    </section>
    

    <section class="prototype_service_area_three bg_color">
        <div class="container">
            <div class="prototype_service_info">
                <div class="symbols-pulse active">
                    <div class="pulse-1"></div>
                    <div class="pulse-2"></div>
                    <div class="pulse-3"></div>
                    <div class="pulse-4"></div>
                    <div class="pulse-x"></div>
                </div>
                <h2 class="f_size_30 f_600 t_color3 l_height45 text-center mb_90 wow fadeInUp" data-wow-delay="0.3s">
                        @if(sizeof($dialouges)>$i)
                        {{$dialouges[$i]->title}}
                        @endif
                    <br> 
                    @if(sizeof($dialouges)>$i)
                        @php
                            print_r($dialouges[$i]->text);
                        @endphp
                    @endif
                    @php
                        $i++;
                    @endphp
                </h2>
                <div class="row p_service_info">
                    @if($products)
                    @foreach($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="p_service_item pr_70 wow fadeInLeft" data-wow-delay="0.3s">
                                @php
                                    $product_image=App\ImageGallery::where('model_id',$product->id)->where('model_type','App\Product')->first();
                                @endphp
                                <div class="icon icon_one">
                                     @if($product_image)    
                                        <img src="{{asset($product_image->image)}}" style="border-radius:10%" width="100px">
                                     @endif
                                </div>
                                <h5 class="f_600 f_p t_color3">{{$product->name}}</h5>
                                <p class="f_400">{{$product->description}}</p>
                            </div>
                        </div>
                    @endforeach
                    @endif
                   
                </div>
            </div>
        </div>
    </section>

    <section class="prototype_featured_area sec_pad">
        <div class="container">
            <h2 class="f_size_30 f_600 t_color3 l_height40 text-center mb_90 wow fadeInUp" data-wow-delay="0.3s">
                    @if(sizeof($dialouges)>$i)
                    {{$dialouges[$i]->title}}
                    @endif
                <br>
                 @if(sizeof($dialouges)>$i)
                    @php
                        print_r($dialouges[$i]->text);
                    @endphp
                @endif
                    @php
                        $i++;
                    @endphp
            </h2>
            <div class="row flex-row-reverse p_feature_item">
                <div class="col-lg-7">
                    <div class="p_feture_img_one wow fadeInRight" data-wow-delay="0.4s">
                        @if(sizeof($gellaries)>$j)
                        <img src="{{asset($gellaries[$j]->image)}}" alt="">
                        @endif
                        @php
                            $j++;
                        @endphp
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-center">
                    <div class="prototype_content wow fadeInLeft" data-wow-delay="0.5s">
                        <h2 class="f_500 f_p t_color3">
                                @if(sizeof($dialouges)>$i)
                                {{$dialouges[$i]->title}}
                                @endif
                        </h2>
                        <div class="prototype_logo">
                            <a href="#">
                                    @if(sizeof($gellaries)>$j)
                                    <img src="{{asset($gellaries[$j]->image)}}" width="100px" alt="">
                                    @endif
                                    @php
                                        $j++;
                                    @endphp
                            </a>
                            
                        </div>
                        <p>
                            @if(sizeof($dialouges)>$i)
                            @php
                                print_r($dialouges[$i]->text);
                            @endphp
                            @endif
                            @php
                                $i++;
                            @endphp
                        </p>
                    </div>
                </div>
            </div>
            <div class="row p_feature_item">
                <div class="col-lg-7">
                    <div class="p_feture_img_two wow fadeInLeft" data-wow-delay="0.3s">
                            @if(sizeof($gellaries)>$j)
                            <img src="{{asset($gellaries[$j]->image)}}" alt="">
                            @endif
                            @php
                                $j++;
                            @endphp
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-center">
                    <div class="prototype_content wow fadeInRight" data-wow-delay="0.3s">
                        <h2 class="f_500 f_p t_color3">
                                @if(sizeof($dialouges)>$i)
                                {{$dialouges[$i]->title}}
                                @endif
                        </h2>
                        <div class="prototype_logo">
                            <a href="#">
                                    @if(sizeof($gellaries)>$j)
                                    <img src="{{asset($gellaries[$j]->image)}}" width="100px" alt="">
                                    @endif
                                    @php
                                        $j++;
                                    @endphp
                            </a>
                            
                        </div>
                        <p>
                                @if(sizeof($dialouges)>$i)
                                @php
                                    print_r($dialouges[$i]->text);
                                @endphp
                                @endif
                                @php
                                    $i++;
                                @endphp
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <section class="prototype_service_area">
        <div class="container custom_container">
            <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="f_p f_size_30 l_height50 f_600 t_color3">
                        @if(sizeof($dialouges)>$i)
                        {{$dialouges[$i]->title}}
                        @endif
                </h2>
                <p class="f_400 f_size_16 mb-0">
                        @if(sizeof($dialouges)>$i)
                        @php
                            print_r($dialouges[$i]->text);
                        @endphp
                        @endif
                        @php
                            $i++;
                        @endphp
                </p>
            </div>
            <div class="service_carousel owl-carousel">
                @if($comments)
                @foreach($comments as $comment)
                <div  class="service_item">
                    <div class="icon s_icon_one"><i class="ti-check"> </i></div>
                    <div class="">
                       

                        @php
                            $user_image=App\ImageGallery::where('model_id',$comment->id)->where('model_type','App\Comment')->first();
                        @endphp
                        <img  width="250px" height="150px"  src="{{asset($user_image->image)}}" >
                    </div>
                    <h3> {{$comment->user_name}}</h3>
                    <div style="display:block">
                            {{$comment->comment}}
                    </div>
                    <img class="float-left" width="20px" height="30px" src="{{asset('star.png')}}" alt="">
                    <b class="float-right" style="font-weight:900">{{$comment->star_rating}}</b>
                </div>
                @endforeach
                @endif
               
            </div>
        </div>
    </section>
    
 @endsection   
  
