@extends('admin.layout')
@section('content')
    
<div class="col-xl-8 col-md-7 col-sm-7">
    @if($questions)
    @foreach($questions as $question)
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    @php
                           $job=App\Job::find($question->job_id);
                           $time=Carbon\Carbon::parse($job->created_at);
                           $start=Carbon\Carbon::parse($job->start_date);
                           $end=Carbon\Carbon::parse($job->expiration_date);
                           $images=App\ImageGallery::where('model_id',$job->id)->where('model_type','App\Job')->get();
                    @endphp
                <h4 class="card-title">{{$job->title}} <span> <sub>Vacancy:({{$job->vacancy}})</sub> </span></h4>
                <h4 class="float-right">
                    @if($job->status==0)
                        <span class="badge badge-danger">Deactive</span>
                    @else 
                        <span class="badge badge-success">Active</span>
                    @endif

                </h4>
                <p class="card-subtitle"> 
                        <h6 >Job Created at: {{$time->format('d M Y')}}</h6>
                        <h6 >Start at: {{$start->format('d M Y')}}</h6>
                        <h6 >Expire at: {{$end->format('d M Y')}}</h6>
                </p>
                <br>
               <div class="card-subtitle float-left">
                   <a class="btn btn-warning float-left">Edit</a>
                    <form action="{{route('delete_ques')}}" class="float-left" id="dltproduct" method="POST">
                        @csrf
                        <input type="hidden" name="delete_ques_id" value="{{$question->id}}">
                        <button onclick="event.preventDefault();showbox();" class="btn btn-danger float-left">Delete</button>
                    </form>
               </div>
               
                <div id="carousel-example-card" class="carousel slide" data-ride="carousel">
               
                   
                    <div class="carousel-inner rounded-0" role="listbox">
                        @if($images)
                        @for($i=0;$i<sizeof($images);$i++)
                            <div class="carousel-item  @if($i==0) active @endif" >
                                <img src="{{$images[$i]->image}}" class="d-block w-100" width="100px" height="400px" alt="First slide">
                            </div> 
                         @endfor
                         @endif
                    </div> 
                </div>
     
            </div>
                    
            
                
                <div class="card-body">
                    
                    <p class="card-text">
                        <h4>Questions ( {{$question->time}}ms )</h4>
                         @if($question->type=='contest_contest')
                                <div class="offset-1">
                                    <h3>Contest Question File</h3> <i>(marks: {{$paper->marks}})</i>
                                    @php
                                        $paper=App\Qpaper::where('question_id',$question->id)->first();
                                    @endphp
                                    @if($paper)
                                    <a target="blank" href="{{asset($paper->file)}}">File</a>
                                    @endif
                                </div>
                         @endif


                         @if($question->type=='single') 
                            <div class="offset-1">
                                <h3>Question File</h3> <i>(marks: {{$paper->marks}})</i>
                                @php
                                    $paper=App\Qpaper::where('question_id',$question->id)->first();
                                @endphp
                                @if($paper)
                                <a target="blank" href="{{asset($paper->file)}}">File</a>
                                @endif
                            </div>
                         @endif


                         @if($question->type=='multiple')
                        
                            @php
                                $paper=App\Qpaper::where('question_id',$question->id)->get();
                            @endphp
                            @if($paper)
                                @include('admin.exam.multiple_question_set')
                            @endif
                         @endif

                    </p>
                    
                </div>
           
        </div>
        @endforeach
        @endif
</div>
{{$questions->links()}}
@endsection
@section('script')
<script>
function showbox(){
   var c=confirm('Confirm Delete ?');
    if(c===true){
       $('#dltproduct').submit();
    }
    
}
</script>
@endsection