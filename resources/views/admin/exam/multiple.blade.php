@extends('admin.layout')
@section('content')
<section id="info-tabs-">
        <div class="row">
            <div class="col-12">
                <div class="card icon-tab">
                    <div class="card-header">
                    <h4 class="card-title">Multiple Choice Qustion</h4>
                    </div>
                    <div class="card-content mt-2">
                    <div class="card-body">
                        <form id="storeProduct" method="POST" action="{{route('paper_save')}}" class="wizard-horizontal" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                       
                        <input type="hidden" value="{{$question_id}}" name="question_id">
                        <div class="row">
                        <div class="form-group">
                                <img src="{{asset('website/plus.png')}}" onclick="shwoimgefield()" width="70px">
                        </div>
                        <div class="col-md-10">
                            <div class="form-group" id="image">
                                <h3>In case of Multiple Correct Answer, Separate them with */*</h3>
                                <div class="col-md-12">
                                    <input name="question[]" placeholder="Question" type="text" class="form-control col-md-8">
                                    <input name="a[]" placeholder="Option A" type="text" class="form-control col-md-5"  >
                                    <input name="b[]" placeholder="Option B" type="text" class="form-control col-md-5"  >
                                    <input name="c[]" placeholder="Option C" type="text" class="form-control col-md-5" >
                                    <input name="d[]" placeholder="Option D" type="text" class="form-control col-md-5" >
                                    <input name="answer[]" placeholder="Correct Answer" type="text" class="form-control col-md-5" >
                                    <input name="marks[]" placeholder="Marks" type="number" class="form-control col-md-5" >
                                </div>
                            
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
            node.innerHTML ="<input " + "type='text'" +" class='form-control col-md-8'"+ "placeholder='Question'" + "name='question[]'"+ ">" + 
                                "<input "+"type='text'" +" class='form-control col-md-5'"+ "placeholder='Option A'" + "name='a[]'"+ ">"+
                                "<input "+"type='text'" +" class='form-control col-md-5'"+ "placeholder='Option B'" + "name='b[]'"+ ">"+
                                "<input "+"type='text'" +" class='form-control col-md-5'"+ "placeholder='Option C'" + "name='c[]'"+ ">"+
                                "<input "+"type='text'" +" class='form-control col-md-5'"+ "placeholder='Option D'" + "name='d[]'"+ ">"+
                                "<input "+"type='text'" +" class='form-control col-md-5'"+ "placeholder='Correct Answer'" + "name='answer[]'"+ ">"+
                                "<input "+"type='number'" +" class='form-control col-md-5'"+ "placeholder='Correct Answer'" + "name='marks[]'"+ ">"+
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
