@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Add a Member</h4>
                    </div>
                    <div class="card-content mt-2">
                    <div class="card-body">
                        <form id="storeProduct" method="POST" action="{{route('post.teammember')}}" class="wizard-horizontal" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Member name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control" placeholder="Designation">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hobby</label>
                                    <input type="text" name="hobby" class="form-control" placeholder="Hobby">
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Education</label>
                                    <input type="text" name="education" class="form-control" placeholder="Total Degree and title to show for education">
                                </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group" id="image">
                                <input name="image" type="file" class="form-control"  >
                                
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

