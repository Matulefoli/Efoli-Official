@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if($teams)
                    @foreach ($teams as $item)
                       @php
                           $imageTeam=App\ImageGallery::where('model_id',$item->id)->where('model_type','App\Team')->first();
                       @endphp 
                    <div class="col-md-12 col-sm-12 col-xl-12 float-left">
                        <img src="{{asset($imageTeam->image)}}" width="200px" alt="">
                    </div>
                    

                    <div class="col-md-6 col-sm-6 col-xl-6 float-left">
                        
                           <h2> {{$item->category_name}}</h2>
                      
                    </div>
                    <div class="col-md-6 col-sm-6 col-xl-6 float-right">
                            @php
                                print_r($item->category_description);
                            @endphp
                    </div>
                    <br>
                    <br>
                    <br>
                    <a class="btn btn-danger col-md-3 col-sm-3 col-xl-3" href="{{url('admin/team_admin_delete/'.$item->id)}}">Delete</a>
                    <hr>
                    @endforeach
                    @endif
                </div>
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Add a Team</h4>
                    </div>
                    <div class="card-content mt-2">
                    <div class="card-body">
                        <form id="storeProduct" method="POST" action="{{route('post.team')}}" class="wizard-horizontal" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Team name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" name="serial" class="form-control" placeholder="Serial">
                                </div>
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                            <h6 class="py-50"> Description</h6>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea name="description" id="summernote" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>  

                        <hr>
                        
                        <div class="col-md-6">
                            <div class="form-group" id="image">
                                <input name="image[]" type="file" class="form-control"  >
                                
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
`                                      <button class="btn btn-info" >Save</button>
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

        $('#summernote').summernote({
        
            tabsize: 3,
            height: 150,  
        });
       
</script>
@endsection

