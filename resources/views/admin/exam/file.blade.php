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
<div class="form-group ">
        <button class="btn btn-info " onclick="event.preventDefault();make_question('{{-$variable}}','new_questiontop');">Make</button>
</div> 
<div class="form-group col-md-12 col-lg-12">
      
    <div class="col-md-12">
         <h3>Question</h3>
        <input name="filequestion{{$variable}}" placeholder="Question" type="file"  class=" col-md-8">
         <h3>Answer</h3>
        <input name="answer{{$variable}}" placeholder="Correct Answer" type="file" class=" col-md-5" >
        <input name="marks{{$variable}}" placeholder="Marks" type="number" class=" col-md-5" >
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