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
                <h2>
                    
                    @if($thankyou)
                        {{$thankyou}}
                    @endif
                </h2>
                <p>We will reach to you very Soon.........</p>
                <a href="{{url('/')}}">Back to home <i class="arrow_right"></i></a>
            </div>
        </div>
</section>

@endsection