@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')
<section class="download_area">
        <div class="container">
            @php
                $thankyou=Session::get('thankyou');
            @endphp
            <div class="download_content thanks_content">
                <img class="img-fluid" src="{{asset('front-asset/asset/img/new/mockup/rocket.png')}}" alt="">
                
                <p>We will reach to you very Soon.........</p>
                <h2>
                    
                        @if(isset($thankyou))
                            {{$thankyou}}
                        @endif
                </h2>
                <a href="{{url('/')}}">Back to home <i class="arrow_right"></i></a>
            </div>
        </div>
</section>

@endsection