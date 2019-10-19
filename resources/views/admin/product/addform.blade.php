@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Add a product</h4>
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
                                    <input type="text" name="name" class="form-control" placeholder="Enter Product name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="link" class="form-control" placeholder="Link">
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
                                    <textarea name="details" class="form-control"></textarea>
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Realise</label>
                                    
                                    <input name="last_realise" type="date" class="form-control" >
                                    
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="d-block">Status</label>
                                        <div class="custom-control-inline">
                                        <div class="radio mr-1">
                                            <input type="radio" value="1" name="status" id="radio5" checked=true>
                                            <label for="radio5">Active</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" value="0" name="status" id="radio888" >
                                            <label for="radio888">Deactive</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div class="form-group">
                                <img src="{{asset('website/plus.png')}}" onclick="shwoimgefield()" width="70px">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="image">
                                <input name="image[]" type="file" class="form-control"  >
                                <span class="float-left">
                                        <img src="{{asset('website/minus.png')}}" onclick="remove_image(this)"  width="30px">
                                </span>
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
        </script>
@endsection
