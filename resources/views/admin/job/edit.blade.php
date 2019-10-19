@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Edit a Job</h4>
                    </div>
                    <div class="card-content mt-2">
                    <div class="card-body">
                        <form id="storeProduct" method="POST" action="{{route('admin.storejob')}}" class="wizard-horizontal" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h3>Heading</h3>
                                    <input type="text" value="{{$job->title}}" name="title" class="form-control" placeholder="Enter Job name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="" for="">
                                    <h6 class="float-left">Application Starts :</h6>   <label for=""><b> {{$job->start_date}}</b></label>
                                </label>
                                <div class="form-group col-md-12 col-sm-12" >
                                  
                                    <input type="date" name="start_date" class="form-control col-md-5 float-left" placeholder="Link">
                                    <h6 class="float-left offset-1">Expire at</h6>
                                    <label for=""><b> :{{$job->expiration_date}}</b></label>
                                    <input type="date" name="end_date" class="form-control col-md-5 offset-1 float-left"  placeholder="Link">
                                </div>
                            </div>

                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <h4 >Details</h4>
                                <textarea name="description" id="summernote" cols="30" rows="10">
                                    {{$job->description}}
                                </textarea>
                            </div>
                            <hr>
                            <br>
                            <div class="col-sm-12 col-md-12">
                                    <h4 for="">Requirements</h4>
                                    <textarea name="requirements" id="summernote1" cols="30" rows="10">
                                        {{$job->requirement}}
                                    </textarea>
                            </div>
                            <hr>
                            <br>
                            <div class="col-sm-12 col-md-12">
                                <h4 for="">Responsibiltiy</h4>
                                <textarea name="responsibility" id="summernote2" cols="30" rows="10">
                                    {{$job->responsibilty}}
                                </textarea>
                            </div>
                            
                           <hr>
                           <br>
                           <div class="col-sm-12 col-md-12">
                                <h4 for="">Application Process</h4>
                                <textarea name="application_process" id="summernote2" cols="30" rows="10">
                                    {{$job->application_process	}}
                                </textarea>
                            </div>
                            
                           <hr>
                           <br>
                           <div class="col-sm-12 col-md-12">
                                <h4 for="">Special Note</h4>
                                <textarea name="special_note" id="summernotespecial" cols="30" rows="10">
                                    {{$job->special_note}}
                                </textarea>
                            </div>
                            
                           <hr>
                           <br>
                            <div class="col-md-12">
                                <div class="form-group col-md-3 col-sm-6">
                                    <label>vacancy</label>
                                    
                                    <input name="vacancy" value="{{$job->vacancy}}" type="text" class="form-control" >
                                    
                                </div>
                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Status</label>
                                        <div class="custom-control-inline">
                                        <div class="radio mr-1">
                                            <input type="radio" value="1" name="status" id="radio5" @if($job->status==1) checked=true @endif>
                                            <label for="radio5">Active</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" value="0" name="status" id="radio888"  @if($job->status==0) checked=true @endif >
                                            <label for="radio888">Deactive</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div class="col-md-12">
                                @php
                                 
                                    $images=App\ImageGallery::where('model_id',$job->id)->where('model_type','App\Job')->get();
                                @endphp  
                                @foreach($images as $image)
                                <img class="img-fluid float-left" src="{{$image->image}}"
                                 width="500px" height="400px" alt="banner">
                                 <a class="btn btn-danger float-left" href="{{url('admin/job_image_delete/'.$image->id)}}">Delete</a>
                                @endforeach
                        </div>
                        <hr>
                        <div class="form-group col-md-12">
                                <img src="{{asset('website/plus.png')}}" onclick="shwoimgefield()" width="70px">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" id="image">
                                <input name="image[]" type="file" class="form-control"  >
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
`                                   <button class="btn btn-info" >Save</button>
                            </div>
                        </div>
                        </fieldset>
                       
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    
@endsection
@section('script')
<script>
        function shwoimgefield(){
          
            var node = document.createElement("div"); 
            node.innerHTML ="<input " + "type='file'" +" class='form-control'"+  "name='image[]'"+ ">" + 
                                  "<span>" + " <img src='{{asset('website/minus.png')}}' onclick='remove_image(this)'   width='30px'>" + "</span>";
           
            var parent=document.getElementById('image');
            parent.appendChild(node);
           // console.log(node);
        }
        function remove_image(n){
            var parent=n.parentNode;
            parent=parent.parentNode;
            parent.remove();
           // console.log(parent);
        }
        
</script>
        <script>
                $('#summernote,#summernotespecial').summernote({
                
                  tabsize: 3,
                  height: 150,  
                });
                $('#summernote2,#summernote1').summernote({
             
                  tabsize: 2,
                  height: 300,  
                });
        </script>
@endsection
