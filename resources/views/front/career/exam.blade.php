@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')

<section class="app_featured_area">
        <div class="container">
            <p>
                You Can only Take this exam once. So please make sure everything is ready to function (pc charge, data connection etc...). 
                Once you hit 'Start' the test will start. The process isn't resumable. <br>
                All the best-Efoli.
            </p>
            <a href="{{url('start_exam/'.$current_job_id.'/'.$current_applicant_id.'/'.$current_application_id)}}">Start</a>
            {{-- <form action="{{route('start_exam')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$current_job_id}}" name="job_id">
                <input type="hidden" value="{{$current_applicant_id}}" name="applicant_id" >
                <input type="hidden" value="{{$current_application_id}}" name="application_id">
                <input type="submit" value="Start">
            </form> --}}
           
        </div>
</section>
@endsection