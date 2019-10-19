  
@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Dialouge </h4>
                    </div>
                    <div class="card-content mt-2">
                    <div class="card-body">
                        <form id="storeProduct" method="POST" action="{{route('admin.store_gal_dal')}}" class="wizard-horizontal" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="title[]" class="form-control">
                                        <textarea class="summernote" name="description[]" >

                                        </textarea>   
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="title[]" class="form-control">
                                        <textarea class="summernote" name="description[]" >

                                        </textarea>   
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="title[]" class="form-control">
                                        <textarea class="summernote" name="description[]" >

                                        </textarea>   
                                    </div>
                                    {{-- <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="title[]" class="form-control">
                                        <textarea class="summernote" name="description[]" >

                                        </textarea>   
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="title[]" class="form-control">
                                        <textarea class="summernote" name="description[]" >

                                        </textarea>   
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="title[]" class="form-control">
                                        <textarea class="summernote" name="description[]" >

                                        </textarea>   
                                    </div> --}}
                                
                            </fieldset>
                       
                            </div>
                            <br>
                            <hr>
                            <br>
                            <hr>
                            <br>
                            <div class="card-header">
                                <h4 class="card-title">Gallery </h4>
                            </div>
                            <div class="card-body">
                           
                            <fieldset>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="imagetitle[]" class="form-control">
                                        <input type="file" placeholder="Title" name="image[]" class="form-control">
                                            
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="imagetitle[]" class="form-control">
                                        <input type="file" placeholder="Title" name="image[]" class="form-control">
                                            
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="imagetitle[]" class="form-control">
                                        <input type="file" placeholder="Title" name="image[]" class="form-control">
                                            
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="imagetitle[]" class="form-control">
                                        <input type="file" placeholder="Title" name="image[]" class="form-control">
                                            
                                    </div>
                                    {{-- <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="imagetitle[]" class="form-control">
                                        <input type="text" placeholder="Title" name="image[]" class="form-control">
                                        
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" placeholder="Title" name="imagetitle[]" class="form-control">
                                        <input type="text" placeholder="Title" name="image[]" class="form-control">
                                            
                                    </div> --}}
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
        $('.summernote').summernote({
            tabsize: 3,
            height: 150,  
        });
        
</script>
@endsection
