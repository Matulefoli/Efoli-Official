@extends('admin.layout')
@section('content')
    
<div class="col-xl-8 col-md-7 col-sm-7">
    @if($jobs)
    @foreach($jobs as $job)
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    @php
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
               <div class="card-subtitle">
                    <a href="{{route('edit_job',$job->id)}}" class="btn btn-info float-left">Edit</a>
                   <form action="{{route('delete_job')}}" id="dltproduct" method="POST">
                        @csrf
                        <input type="hidden" name="delete_job_id" value="{{$job->id}}">
                        <button onclick="event.preventDefault();showbox();" class="btn btn-danger float-left">Delete</button>
                    </form>
               </div>
               <br>
               
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
                        <h4>Description</h4>
                    @php
                        print_r($job->description);
                    @endphp
                    </p>
                    <p class="card-text">
                        <h4>Requirements</h4>
                        @php
                            print_r($job->requirement);
                        @endphp
                    </p>
                    <p class="card-text">
                            <h4>Responsibilty</h4>
                            @php
                                print_r($job->responsibilty);
                            @endphp
                    </p>
                    <p class="card-text">
                            <h4>Application_process</h4>
                            @php
                                print_r($job->application_process);
                            @endphp
                    </p>
                    <p class="card-text">
                            <h4>Special_note</h4>
                            @php
                                print_r($job->special_note);
                            @endphp
                    </p>
                </div>
           
        </div>
        @endforeach
        @endif
</div>
{{$jobs->links()}}
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