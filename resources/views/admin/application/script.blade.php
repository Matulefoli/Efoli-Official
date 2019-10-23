@extends('admin.layout')
@section('content')
 @php
    $question_id=App\JobQuestion::get_question_id($hall->job_id);
    $got_marks=App\TeacherCheck::gained_marks($hall->job_id,$hall->applicant_id);
    $total_marks=App\QuestionManagement::get_total_marks($question_id);
    $applicant=App\Applicant::find($hall->applicant_id);
    $paper=App\TeacherCheck::where('applicant_id',$hall->applicant_id)->where('job_id',$hall->job_id)->get();
    $s=App\ShortList::where('job_id',$hall->job_id)->where('applicant_id',$applicant->id)->count();
 @endphp 
<div class="col-xl-12 col-md-12 col-sm-12">
    <h3>Applicant: @if($applicant) {{$applicant->name}} @endif</h3>
    <h4 class="card-header">
        Marks:{{$got_marks}}/{{$total_marks}}
    </h4>
    
    <div class='card col-md-5 col-sm6 col-lg-5'> 
    @if($s>0) 
    <a href="{{url('admin/add_short_list/'.$applicant->id.'/'.$hall->job_id)}}" class="btn btn-sm btn-warning float-left">UnList</a>
    @else 
    <a href="{{url('admin/add_short_list/'.$applicant->id.'/'.$hall->job_id)}}" class="btn btn-sm btn-success float-left">Shortlist</a>
    @endif
    </div>
    <br>
    <br>
@if($paper)
    @foreach ($paper as $paper)
     

            @php
             $q=$paper->sub_ques_type::find($paper->sub_ques_id);
           
            @endphp
            @if($q)
               
                    
                    @if($paper->sub_ques_type=='App\Qfile')
                        <p>Question: <a target="blank" href={{asset($q->question)}}>File ({{$q->marks}})</a> </p>
                    @if($q->answer)
                        <a target="blank" href={{asset($q->answer)}} > file </a>
                        <hr>
                        <br>
                    @endif
                    @else
                        <p>Question: {{$q->question}} ({{$q->marks}})</p>
                        <p>Answer: 
                            @php  
                                print_r($paper->submitted_answer);
                            @endphp
                        </p>
                    @endif
                        <p>Gained: {{$paper->gained_marks}} </p>
                    <hr>
                    <br>
              
            @endif


     
      

    @endforeach
@endif
</div>
@endsection