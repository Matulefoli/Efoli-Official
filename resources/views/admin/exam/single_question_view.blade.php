@extends('admin.layout')
@section('content')  
<div class="col-xl-12 col-md-12 col-sm-12" style="padding:10px;">
    @php
        $all_question=$question->question_management;
      //  print_r($all_question);
    @endphp   
    @if($question)
    <div class="card">
        <div class="well">
            Question Name: <h1> {{$question->name}} </h1>    
        </div>
      
        <br>
        
    </div>   
    @endif
    @foreach($all_question as $q)
        @if($q->model_type=='App\Qsingle')
            @php
                $one=App\Qsingle::find($q->model_id);
            @endphp
            <div class="card">
                <h4 class="card-heder">{{$q->serial}}. <u> Question:{{$one->question}} (Single question)</u></h4>
                <p class="">
                    <h5> <u>Answer Set:</u> </h5>
                    @php
                        $arr=$one->answer_set;
                        $arr=json_decode($arr,true);


                    @endphp
                    @foreach($arr as $answer)
                        <i> <b>{{$answer}} </b>, </i> 
                        <br>
                    @endforeach

                </p>
                <h5>Correct: {{$one->correnct_ans}}</h5>
                <h5>Marks: {{$one->marks}}</h5>
            </div>
        @elseif($q->model_type=='App\Qmulti')
            @php
                $one=App\Qmulti::find($q->model_id);
            @endphp
            <div class="card">
                    <h4 class="card-header">{{$q->serial}}. <u> Question:{{$one->question}} (Multiple Choice)</u></h4>
                    <p>
                        <h5> <u>Answer Set:</u> </h5>
                        @php
                            $arr=$one->answer_set;
                            $arr=json_decode($arr,true);
    
    
                        @endphp
                        @foreach($arr as $answer)
                            <i> <b>{{$answer}} </b>, </i> 
                            <br>
                        @endforeach
    
                    </p>
                    @php
                    $arr=$one->correnct_ans_set;
                    $arr=json_decode($arr,true);
                    @endphp
                    <h5>Correct: 
                        @foreach($arr as $answer)
                            <i> <b>{{$answer}} </b>, </i> 
                            <br>
                        @endforeach    
                    </h5>
                    <h5>Marks: {{$one->marks}}</h5>
            </div>
        @elseif($q->model_type=='App\Qfile')
            @php
                $one=App\Qfile::find($q->model_id);
            @endphp
            <div class="card">
                <h4 class="card-header">{{$q->serial}}. <u><a href="{{asset($one->question)}}" target="blank"> Open Question File (File)</a></u></h4>
                @if($one->answer)
                <h4>
                        <a href="{{asset($one->answer)}}" target="blank"> Open Answer File</a></u>
                </h4>
                @endif
                <h5>Marks: {{$one->marks}}</h5>
            </div>
        @elseif($q->model_type=='App\Qlong')
            @php
                $one=App\Qlong::find($q->model_id);
            @endphp
            <div class="card">
                    <h4 class="card-header"> {{$q->serial}}. <u> Question:{{$one->question}} (Long Question)</u></h4>
                    <p>
                        <h5> <u>Answer:</u> </h5>
                       
                        {{$one->correct_ans}}
                    </p>
                    
                    <h5>
                        max length: {{$one->length}}
                        
                    </h5>
                    <h5>Marks: {{$one->marks}}</h5>
            </div>
        @else 
            @php
                $one=App\Qshort::find($q->model_id);
            @endphp
            <div class="card">
                    <h4 class="card-header">{{$q->serial}}. <u> Question:{{$one->question}} (Short Question)</u></h4>
                    <p>
                        <h5> <u>Answer:</u> </h5>
                       
                        {{$one->correct_ans}}
                    </p>
                    
                    <h5>
                        max length: {{$one->length}}
                        
                    </h5>
                    <h5>Marks: {{$one->marks}}</h5>
            </div>

        @endif
    @endforeach   
</div>
@endsection