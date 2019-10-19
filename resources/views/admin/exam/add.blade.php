@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Question</h4>
                    </div>
                    <div class="card-content mt-2">
                    <div class="card-body">
                        <form id="storeProduct" method="POST" action="{{route('select_question')}}" class="wizard-horizontal" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h3>Job</h3>
                                    <select name="job" id="" class="form-control">
                                        @if($jobs)
                                        @foreach($jobs as $job)
                                            <option value="{{$job->id}}">{{$job->title}}</option>
                                        @endforeach

                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <select name="type" class="form-control" id="">
                                    <option value="contest_contest">Single file(contest)</option>
                                    <option value="single">Single file</option>
                                    <option value="multiple">Objective</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-5 col-md-5">
                                <label for="">Q Setter Email</label>
                                <input type="email"  name="setter" class="form-control">
                            </div>
                            <div class="form-group col-sm-5 col-md-5">
                                    <label for="" class="float-left">HH</label>
                                    <input type="number"  name="hh" class="form-control col-sm-2 col-md-2 float-left">
                                    <label for="" class="float-left">MM</label>
                                    <input type="number"  name="mm" class="form-control col-sm-2 col-md-2 float-left">
                                    <label for="" class="float-left">SS</label>
                                    <input type="number"  name="ss" class="form-control col-sm-2 col-md-2 float-left">
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <button class="btn btn-success">Go</button>
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
            console.log(node);
        }
        function remove_image(n){
            var parent=n.parentNode;
            parent=parent.parentNode;
            parent.remove();
            console.log(parent);
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
