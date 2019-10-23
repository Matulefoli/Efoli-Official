@extends('admin.layout')
@section('content')
@php
    if(!Session::has('i')){
        Session::put('i',0);
    }
    else{
        $variable=Session::get('i');
        $variable++;
        Session::put('i',$variable);
    }
  
  //  echo Session::get('i');
@endphp
<section id="info-tabs-">
        <div class="row">
                <div class="col-12">
                        <div class="card icon-tab">
                            <div class="card-header">
                                Contest Setup
                            </div>
                            <div class="card-body">
                                <form action="{{route('paper_save')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$question_id}}" name="question_id">
                                    <div class="form-group float-left">
                                        <h6>make a question</h6>
                                        <select name="" id="make_ques{{$variable}}" >
                                           
                                            <option value="single" onkeydown="">Single Choice</option>
                                            <option value="multiple">Multiple Choice</option>
                                            <option value="short">Short Answer</option>
                                            <option value="long">Long Answer</option>
                                            <option value="file">File</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <button class="btn btn-info " onclick="event.preventDefault();make_question('{{$variable}}','new_question');">Make</button>
                                    </div>
                                    <div id="new_question{{$variable}}">

                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
        </div>
</section>
@endsection
@section('script')
<script>
function make_question(rand_var,pos='new_question'){
    var value=$('#make_ques'+rand_var).val();
    $.ajax({
        type:'get',
        data:{'type':value},
        url:'{{url('admin/make_question')}}',
        success:function(data){  
            console.log(data);
            console.log(pos+rand_var);
            var node = document.createElement("div"); 
            node.innerHTML =data;
            var parent=document.getElementById(pos+rand_var);
            console.log(parent);
            parent.appendChild(node);
           // $('#new_question').html(data);
        }
    })
}

 
function create_new_single( i){
        console.log(i);
        var node=document.createElement("div");
        node.innerHTML="<input type='text' placeholder='Option'"+ " name=" +"singleans"+i+"[]" +" class='col-md-5' >";
        var parent=document.getElementById('singleInput'+i);
        parent.appendChild(node);
} 
function create_new_multiple(i){
    var node=document.createElement("div");
    node.innerHTML="<input type='text' placeholder='Option' class='col-md-6 form-control' "+" name="+"multians"+i+"[] >";
    var parent=document.getElementById('multiput'+i);
    parent.appendChild(node);
}
</script>
   
   
@endsection