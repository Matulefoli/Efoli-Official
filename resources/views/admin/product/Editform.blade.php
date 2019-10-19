@extends('admin.layout')
@section('content')
<style>

</style>
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Edit a product</h4>
                    </div>
                    <div class="card-content mt-2">
                    <div class="card-body">
                        <form id="storeProduct" method="POST" action="{{route('admin.storeproduct')}}" class="wizard-horizontal" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Enter Product name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="link" value="{{$product->link}}" class="form-control" placeholder="Link">
                                </div>
                            </div>
                        
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                            <h6 class="py-50">Product Details</h6>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea name="details" rows="30" cols="30" class="form-control">
                                        {{$product->description}}
                                    </textarea>
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Realise: <b>{{$product->last_realize}}</b></label>
                                    
                                    <input name="last_realise" type="date" class="form-control" >
                                    
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="d-block">Status</label>
                                        <div class="custom-control-inline">
                                        <div class="radio mr-1">
                                            <input type="radio" value="1" name="status" id="radio5" @if($product->status==1) checked=true @endif>
                                            <label for="radio5">Active</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" value="0" name="status" id="radio888" @if($product->status==0) checked=true @endif>
                                            <label for="radio888">Deactive</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div>
                            @php
                              //  $time=Carbon\Carbon::parse($product->created_at);
                                $images=App\ImageGallery::where('model_id',$product->id)->where('model_type','App\Product')->get();
                            @endphp  
                            @foreach($images as $image)
                            <img class="img-fluid float-left" src="{{$image->image}}"
                             width="500px" height="400px" alt="banner">
                             <a class="btn btn-danger float-left" href="{{url('admin/prduct_image_delete/'.$image->id)}}">Delete</a>
                            @endforeach
                        </div>
                        <div class="form-group">
                                <img src="{{asset('website/plus.png')}}" onclick="shwoimgefield()" width="70px">
                        </div>
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
        function delete_image(id){
            $.ajax({
                type:'get',
                data:{'id':id},
                url:'{{url('admin/prduct_image_delete')}}',
                success:function(){

                }
            })
        }
        </script>
@endsection
