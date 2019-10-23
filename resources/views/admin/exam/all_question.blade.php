@extends('admin.layout')
@section('content')
    
<div class="col-xl-12 col-md-12 col-sm-12">
@if($questions)
@foreach($questions as $question)

   <div class="card">
       <u style="list-style:none" class=" col-md-12 col-sm-12 col-lg-12">

           <li > Question name: 
            <a href="{{route('see_question',$question->id)}}">
                    <h3>{{$question->name}}</h3>
            </a>
               
           </li>
           <br>
           <li>
               <h4>Total time: {{$question->time}} (ms)</h4>
           </li>
           @if($question->status==1)
           <li>
               <h4 class="float-left">Status: Active </h4>
               <a href="{{url('admin/active_deactive_question/'.$question->id)}}" class="btn btn-danger">Deactivate Now</a>
           </li>
           @else 
           <li>
                <h4 class="float-left">Status: DeActived </h4>
                <a href="{{url('admin/active_deactive_question/'.$question->id)}}" class="btn btn-success">activate Now</a>
            </li>
           @endif
           <li >
               <a  class="btn btn-danger" href="{{url('admin/delques/'.$question->id)}}">Delete</a>
           </li>
       </u>
       <hr>
       <br>
      
       <br>
       @if($question->status==1)
       <u class=" col-md-12 col-sm-12 col-lg-12">
           <h3>Attached Jobs</h3>
                @php
                    $attachments=App\JobQuestion::where('question_id',$question->id)->get();
                @endphp
                @if($attachments)
                @foreach($attachments as $attachment)
                    @php
                        $attach_job=App\Job::find($attachment->job_id);
                       
                    @endphp
                    <li>
                        @if($attach_job)
                        {{$attach_job->title}}
                        @endif
                        <button  class="btn btn-warning" onclick="event.preventDefault();detach('{{$attach_job->id}}');">Detach</button>
                    </li>
                @endforeach
                @endif
       </u>
       <hr>
     
       <br>
       <br>
       <div class="col-md-12 col-sm-12 col-lg-12">
           <h3>Add A Job to the exam</h3>
            <select name="" class="form-control" id="select_job">
                @if($jobs)
                @foreach ($jobs as $job)
                    <option value="{{$job->id}}">{{$job->title}}</option>
                @endforeach
                @endif
            </select>
            <button class="btn btn-success" onclick="event.preventDefault();add_job_to_exam()">Add</button>
       </div>
       @endif
        
   </div>

@endforeach
{{$questions->links()}}
@endif
</div>
@endsection

@section('script')
<script>
    function add_job_to_exam(){

        var job_id=$('#select_job').val();
        var question_id={{ $question->id}};
        console.log(question_id);
        $.ajax({
            type:'get',
            data:{'job_id':job_id,'question_id':question_id},
            url:'{{url('admin/attach_to_job')}}',
            success:function(){
                location.reload();
            }

        })
    }
    function detach(job_id){
        var question_id={{ $question->id}};
        $.ajax({
            type:'get',
            data:{'job_id':job_id,'question_id':question_id},
            url:'{{url('admin/attach_to_job')}}',
            success:function(){
                location.reload();
            }

        })
    }
</script>
@endsection