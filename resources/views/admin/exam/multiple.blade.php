@php
    if(!Session::has('i')){
        Session::put('i',0);
    }
    else{
        $variable=Session::get('i');
        $variable++;
        Session::put('i',$variable);
    }
   // echo Session::get('i');
@endphp

<div id="new_questiontop{{-$variable}}" class="col-md-12 col-lg-12">

</div>
<hr>
<br>
<div class="form-group col-md-12 col-lg-12">
    <h6>make a question</h6>
    <select name="" id="make_ques{{-$variable}}" >
        
        <option value="single" onkeydown="">Single Choice</option>
        <option value="multiple">Multiple Choice</option>
        <option value="short">Short Answer</option>
        <option value="long">Long Answer</option>
        <option value="file">File</option>
    </select>
</div>
<div class="form-group col-md-12 col-lg-12">
        <button class="btn btn-info " onclick="event.preventDefault();make_question('{{-$variable}}','new_questiontop');">Make</button>
</div>                       
                       
<div class="row">

<div class="col-md-12 col-lg-12">
    <div class="form-group" id="image">
        <h3>In case of Multiple Correct Answer, Separate them with */*</h3>
        <div class="col-md-12"><i  class="fa fa-plus" onclick="create_new_multiple('{{$variable}}');"></i>
            <input name="multiquestion{{$variable}}" placeholder="Question" type="text"  class="form-control col-md-8">
            <div id="multiput{{$variable}}">

                <input name="multians{{$variable}}[]" placeholder="Option " type="text" class="form-control col-md-5"  >
            </div>
            
            <input name="answer{{$variable}}" placeholder="Correct Answer" type="text" class="form-control col-md-5" >
            <input name="marks{{$variable}}" placeholder="Marks" type="number" class="form-control col-md-5" >
        </div>
    
    </div>
</div>
                
                    
<div class="form-group col-md-12 col-lg-12">
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
<br>
<br>
<hr>
<div id="new_question{{$variable}}" class="col-md-12 col-lg-12">

</div>