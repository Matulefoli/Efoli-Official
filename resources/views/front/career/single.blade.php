@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')
@php
    $images=App\ImageGallery::where('model_id',$job->id)->where('model_type','App\Job')->get();
@endphp
<section class="app_featured_area">
        <div class="container">
            <div class="row flex-row-reverse app_feature_info">
                <div class="col-lg-6">
                    <div class="app_fetured_item">
                        <div class="app_item item_one" data-parallax='{"x": 0, "y": 70}'>
                            @if(sizeof($images)>0)
                            <img src="{{asset($images[0]->image)}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                            @else 
                            <img src="{{asset('person.png')}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                            @endif
                         
                        </div>
                        <div class="app_item item_two" data-parallax='{"x": 0, "y": -10}'>
                           @if(sizeof($images)>1)
                            <img src="{{asset($images[1]->image)}}" class="ti-receipt f_size_40 w_color" alt="" width="150px">
                           @else 
                           <img src="{{asset('person.png')}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                           @endif
                           
                        </div>
                        <div class="app_item item_three" data-parallax='{"x": 50, "y": 40}'>
                           @if(sizeof($images)>2) 
                            <img src="{{asset($images[2]->image)}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                           @else 
                           <img src="{{asset('person.png')}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                           @endif
                            
                        </div>
                        <div class="app_item item_four" data-parallax='{"x": -20, "y": 90}'>
                           @if(sizeof($images)>3)
                            <img src="{{asset($images[3]->image)}}" class="ti-tablet f_size_40 w_color" alt="" width="150px">
                           @else 
                           <img src="{{asset('person.png')}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                           @endif
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="app_featured_content">
                        <h2 class="f_p f_size_30 f_700 t_color3 l_height45 pr_70 mb-30">{{$job->title}}</h2>
                        <p >
                            <h3>Description</h3>
                            @php
                                print_r($job->description);
                            @endphp
                        </p>
                        <p >
                            <h3>Requirements</h3>
                            @php
                                   print_r($job->requirement)
                            @endphp
                        </p>
                        <p >
                            <h3>Responsibility</h3>
                            @php
                                print_r($job->responsibilty);
                            @endphp
                        </p>
                        <p >
                            <h3>Special Note</h3>
                                @php
                                   print_r($job->special_note);
                                @endphp
                        </p>
                        <a href="#" class="learn_btn_two">See All Featureds <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection