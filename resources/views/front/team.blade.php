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

<section class="breadcrumb_area" style="background-image: @if($team_image) {{asset($team_image->image)}}; @endif">
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
                     $members=App\TeamMemberJoinTable::where('team',$team->id)->get();
                @endphp
            </p>
        </div>
        <div class="row">
            @if($members)
            @foreach ($members as $member)
                
          
            @php
                $person_image=App\ImageGallery::where('model_id',$member->member)->where('model_type','App\TeamMember')->first();
                $person=App\TeamMember::find($member->member);
            @endphp
            <div class="col-lg-3 col-sm-6">
                <div class="ex_team_item">
                    @if($person_image)
                    <img src="{{asset($person_image->image)}}" width="150px" alt="">
                    @else 
                    <img src="{{asset('person.png')}}" alt="" width="150px">
                    @endif
                    <div class="team_content">
                        <a href="#">
                            <h3 class="f_p f_size_16 f_600 t_color3">{{$person->name}}</h3>
                        </a>
                        <h5>{{$person->designation}}</h5>
                    </div>
                    <div class="hover_content">
                        <div class="n_hover_content">
                           
                            <div class="br"></div>
                            <a href="#">
                                <h3 class="f_p f_size_16 f_600 w_color">{{$person->name}}</h3>
                            </a>
                            <h5>{{$person->designation}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
   
        
          
        </div>
    </div>
</section>
@endforeach
@endif  
@endsection