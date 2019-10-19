@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')
@if($teams)
@foreach ($teams as $team)
  @php
      $team_image=App\ImageGallery::where('model_id',$team->id)->where('model_type','App\Team')->first();
  @endphp  

<section class="breadcrumb_area" style="background-image: {{asset($team_image->image)}}; ">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h1 class="f_p f_700 f_size_50 w_color l_height50 mb_20">Meet The Team {{$team->category_name}}</h1>
           
        </div>
    </div>
</section>

<section class="experts_team_area sec_pad">
    <div class="container">
        <div class="sec_title text-center mb_70">
            <h2 class="f_p f_size_30 l_height30 f_700 t_color3 mb_20">The Experts Team</h2>
            <p class="f_400 f_size_16">
                @php
                     print_r($team->category_description);
                     $mem=App\TeamMember::find($item->member);
                @endphp
            </p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="ex_team_item">
                    <img src="{{asset($person_image->image)}}" alt="">
                    <div class="team_content">
                        <a href="#">
                            <h3 class="f_p f_size_16 f_600 t_color3">Phillip Anthropy</h3>
                        </a>
                        <h5>web designer</h5>
                    </div>
                    <div class="hover_content">
                        <div class="n_hover_content">
                           
                            <div class="br"></div>
                            <a href="#">
                                <h3 class="f_p f_size_16 f_600 w_color">Phillip Anthropy</h3>
                            </a>
                            <h5>web designer</h5>
                        </div>
                    </div>
                </div>
            </div>
   
         
          
        </div>
    </div>
</section>
@endforeach
@endif  
@endsection