@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')
@php
  
    $question_id=App\JobQuestion::get_question_id($job_id);
   // print_r($question_id); die();
    $question=App\Question::find($question_id);
    $all_question=App\QuestionManagement::where('question_id',$question->id)->orderBy('serial')->get();
@endphp
@if($question)
<section class="app_featured_area">
    <div class="container">
        <div class="container card col-md-12 col-lg-12 col-sm-12">
            <h3 class="card-header"> Question name= {{$question->name}}</h3>
            <h4>Time: {{$question->time}}ms  
            @php
                $on_minute=($question->time/1000)/60;
            @endphp
            @if(isset($on_minute))
            ({{$on_minute}}m)
            <br> <h6>Now time: {{date('h:i:s')}}</h6>
                 <h6>After {{ date('d/m/Y h:i:s', ($hall->end_time/1000))}} the answer will not be valid anymore </h6>
            @endif
            </h4>
           
        </div>
        <div class="container card-body">
            <form action="{{route('submit_answer_sheet')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="hall_id" value="{{$hall->id}}">
                <input type="hidden" value="{{$question_id}}" name="question_id">
                <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                <input type="hidden" name="job_id" value="{{$job_id}}">
            @if($all_question)
                @foreach($all_question as $all)
                    @if($all->model_type=='App\Qsingle')
                    <br>
                    <div class="card-bordered">
                        @php
                            $q=App\Qsingle::find($all->model_id);

                        @endphp
                        @if($q)
                        <h3 class="card-header">{{$all->serial}}. {{$q->question}}</h3>
                        @php
                            $ans=json_decode($q->answer_set);
                        @endphp
                        @if($ans)
                            @foreach($ans as $ans)
                                
                                <input type="radio" name="single{{$q->id}}" value="{{$ans}}" class=""> {{$ans}}
                                <br>
                            @endforeach
                        @endif
                        @endif
                      
                    </div>
                    @elseif($all->model_type=='App\Qmulti')
                    <br>
                    <div class="card-bordered">
                        @php
                            $q=App\Qmulti::find($all->model_id);

                        @endphp
                        @if($q)
                        <h3 class="card-header">{{$all->serial}}.{{$q->question}}</h3>
                        @php
                            $ans=json_decode($q->answer_set);
                            // print_r($ans);die();
                        @endphp
                        @if($ans)
                            @for($i=0;$i<sizeof($ans);$i++)                   
                                <input type="checkbox" name="multi{{$q->id}}key{{$i}}" value="{{$ans[$i]}}" class=""> {{$ans[$i]}}
                                <br>
                            @endfor
                        @endif
                        @endif
                        
                    </div>
                    @elseif($all->model_type=='App\Qshort')
                    <br>
                    <div class="card-bordered">
                            @php
                                $q=App\Qshort::find($all->model_id);
    
                            @endphp
                            @if($q)
                            <h3 class="card-header">{{$all->serial}}.{{$q->question}}</h3>
                            
                         
                            <input type="text" name="short{{$q->id}}" class="form-control" maxlength="{{$q->length}}">
                            @endif
                            
                    </div>
                    @elseif($all->model_type=='App\Qlong')
                    <br>
                    <div class="card-bordered">
                            @php
                                $q=App\Qlong::find($all->model_id);
    
                            @endphp
                            @if($q)
                            <h3 class="card-header">{{$all->serial}}.{{$q->question}}</h3>
                            
                            
                            <textarea name="long{{$q->id}}" id="" class="form-control"  maxlength="{{$q->length}}" cols="30" rows="10"></textarea>
                           
                            @endif
                            
                    </div>
                    @else 
                    <br>
                    <div class="card-bordered">
                            @php
                                $q=App\Qfile::find($all->model_id);
    
                            @endphp
                            @if($q)
                            <h3 class="card-header">{{$all->serial}}.{{$q->question}}</h3>
                            
                            <label for="">Answer</label>
                            <input type="file" name="file{{$q->id}}" class="form-control">
                           
                            @endif
                            
                    </div>
                    @endif
             
                @endforeach
                <br>
                <br>
                <div class="form-group">
                    <input type="submit" value="Save and Send" class="btn btn-success">
                </div>
            @endif
            </form>
        </div>
    </div>
</section>
@endif
@endsection