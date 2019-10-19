@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')

<section class="app_featured_area">
        <div class="container">
            @if($jobs)
            @foreach ($jobs as $job)
              @php
                  $today=Carbon\Carbon::today();
                  if($job->expiration_date){

                      $expire=Carbon\Carbon::parse($job->expiration_date);
                      if($expire>$today){
                          continue;
                        }
                  }
              @endphp  
          
            <div class="row flex-row-reverse app_feature_info">
                <div class="col-lg-6">
                    <div class="app_fetured_item">
                          
                        <div class="app_item item_one" data-parallax='{"x": 0, "y": 70}'> 
                            @php
                                 $images=App\ImageGallery::where('model_id',$job->id)->where('model_type','App\Job')->get();
                            @endphp
                            @if(sizeof($images)>0)
                            <img src="{{asset($images[0]->image)}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                            @else 
                            <img src="{{asset('person.png')}}" class="ti-face-smile f_size_40 w_color" alt="" width="150px">
                            @endif
                            <h6 class="f_p f_400 f_size_16 w_color l_height45">{{$job->title}}</h6>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                       
                    <div class="app_featured_content">
                        <h2>    <b>{{$job->title}}</b> </h2>
                        <p class="f_400">
                            @php
                                print_r($job->description);
                            @endphp
                        </p>
                        <a href="{{route('single_job_description',$job->id)}}" class="learn_btn_two">View Details <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>

@endsection