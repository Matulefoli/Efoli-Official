@extends('admin.layout')
@section('content')
    
<div class="col-xl-12 col-md-10 col-sm-10">
    <div class="float-left">
        <button class="btn btn-info float-left" onclick="showdiv('all')">All</button>
        <button class="btn btn-info float-left" onclick="showdiv('ignored')">Till Ignored</button>
        <button class="btn btn-info float-left" onclick="showdiv('replied')">Replied</button>
        <button class="btn btn-info float-left" onclick="showdiv('important')">Important</button>
    </div>
    <br>
    
    <div class="card col-xl-12 col-md-10 col-sm-10" id="all">
        <table class="table table-active table-bordered card-body">
            <thead>
                <th colspan="1">
                    <input type="checkbox" id="checkedAllcheck">
                </th>
                <th>User Email</th>
                <th>Sent at</th>
                <th>Sender Name</th>
                <th>Message</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if($messages)
                @foreach($messages as $message)
                    <tr>
                        <td>
                            <input type="checkbox"   class="single_row" id="{{$message->sender_email}}">
                        </td>
                        <td>
                            {{$message->sender_email}}
                        </td>
                        <td>
                            @php
                            $time=Carbon\Carbon::parse($message->created_at);
                            $time=$time->format('d-m-Y');
                            @endphp
                               {{$time}}
                        </td>
                        <td>

                            {{$message->sender_name}}
                        </td>
                        <td>
                            {{$message->message}}
                        </td>
                        <td>
                                <a class="btn btn-sm btn-danger"  href="{{route('del_messagebyadmin',$message->id)}}">Delete</a>
                                <a class="btn btn-sm btn-danger" href="{{route('mark_imp',$message->id)}}">Mark Impt</a>
                                <a class="btn btn-sm btn-danger" href="{{route('mark_ing',$message->id)}}">Mark ing</a>
                        </td>
                    </tr>
                
                @endforeach
                @endif
            </tbody>
        </table>
        {{$messages->links()}}

    </div>
    <div class="card col-xl-12 col-md-10 col-sm-10" id="ignored" style="display:none">
        <table class="table table-active table-bordered card-body"  >
            <thead>
                <th colspan="1">
                    <input type="checkbox"   id="checkedAllcheckign" >
                </th>
                <th>User Email</th>
                <th>Sent at</th>
                <th>Sender Name</th>
                <th>Message</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if($ignoredmessages)
                @foreach($ignoredmessages as $message)
                    <tr>
                        <td>
                            <input type="checkbox" class="single_rowign" id="{{$message->sender_email}}">
                        </td>
                        <td>
                            {{$message->sender_email}}
                        </td>
                        <td>
                            @php
                            $time=Carbon\Carbon::parse($message->created_at);
                            $time=$time->format('d-m-Y');
                           @endphp
                           {{$time}}
                        </td>
                        <td>

                            {{$message->sender_name}}
                        </td>
                        <td>
                            {{$message->message}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-danger"  href="{{route('del_messagebyadmin',$message->id)}}">Delete</a>
                            <a class="btn btn-sm btn-danger" href="{{route('mark_imp',$message->id)}}">Mark Impt</a>
                          
                        </td>
                    </tr>
                
                @endforeach
                @endif
            </tbody>
        </table>
        {{$ignoredmessages->links()}}
    </div>
    <div class="card col-xl-12 col-md-10 col-sm-10" id="replied" style="display:none">
            <table class="table table-active table-bordered card-body" >
                <thead>
                    <th colspan="1">
                        <input type="checkbox" id="checkedAllcheckrep">
                    </th>
                    <th>User Email</th>
                    <th>Sent at</th>
                    <th>User Name</th>
                    <th>Message</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if($repliedmessages)
                    @foreach($repliedmessages as $message)
                        <tr>
                            <td>
                                <input type="checkbox"  class="single_rowrep" id="{{$message->sender_email}}">
                            </td>
                            <td>
                                {{$message->sender_email}}
                            </td>
                            <td>
                              
                                @php
                                     $time=Carbon\Carbon::parse($message->created_at);
                                     $time=$time->format('d-m-Y');
                                @endphp
                                {{$time}}
                            </td>
                            <td>
    
                                {{$message->sender_name}}
                            </td>
                            <td>
                                {{$message->message}}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger"   href="{{route('del_messagebyadmin',$message->id)}}">Delete</a>
                                <a class="btn btn-sm btn-danger" href="{{route('mark_imp',$message->id)}}">Mark Impt</a>
                                
                            </td>
                        </tr>
                    
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{$repliedmessages->links()}}
    </div>
    <div class="card col-xl-12 col-md-10 col-sm-10" id="important" style="display:none">
            <table class="table table-active table-bordered card-body" >
                <thead>
                    <th colspan="1">
                        <input type="checkbox" id="checkedAllcheckimp">
                    </th>
                    <th>User Email</th>
                    <th>Sent at</th>
                    <th>Sender Name</th>
                    <th>Message</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if($importantmessages)
                    @foreach($importantmessages as $message)
                        <tr>
                            <td>
                                <input type="checkbox" onclick="" class="single_rowimp" id="{{$message->sender_email}}">
                            </td>
                            <td>
                                {{$message->sender_email}}
                            </td>
                            <td>
                                @php
                                $time=Carbon\Carbon::parse($message->created_at);
                                $time=$time->format('d-m-Y');
                                @endphp
                                   {{$time}}
                            </td>
                            <td>
    
                                {{$message->sender_name}}
                            </td>
                            <td>
                                {{$message->message}}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger"   href="{{route('del_messagebyadmin',$message->id)}}">Delete</a>
                                <a class="btn btn-sm btn-danger" href="{{route('mark_imp',$message->id)}}">Mark unimportant</a>
                                <a class="btn btn-sm btn-danger" href="{{route('mark_ing',$message->id)}}">Mark ing</a>
                               
                            </td>
                        </tr>
                    
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{$importantmessages->links()}}
    </div>
    <div class="col-xl-12 col-md-12 col-sm-10" data-toggle="modal" data-target="#exampleModal">
            <a class="btn btn-info " onclick="event.preventDefault();sendmailcount()">Send Email</a>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Email</h5>
            <h6 id="email_count"></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" id="" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group"> 
                        <label for="">Subject</label>
                        <input type="text" name="subject" id="mail_subject" class="form-control" required>
                    </div>
                    <div>
                        <label for="">Body</label>
                        <textarea name="message" class="form-control" id="mail_text" cols="30" rows="10" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" onclick="event.preventDefault();sendmail()" class="btn btn-primary">
                </div>
        </form>
        
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
var list=['all','ignored','replied','important'];
var eamil_list=[];
function showdiv(id){
    for(var i=0;i<list.length;i++){
        if(id==list[i]){
            $('#'+list[i]).show();
        }
        else{
            $('#'+list[i]).hide();
        }
    }
}


//all start

$(document).on('click', '#checkedAllcheck', function() {
    var eamil_list=[];
  if(this.checked){
   $(".single_row").each(function(){
        this.checked=true;
        var list= $(this).attr('id');
        eamil_list.push(list);
   })   
      
 }else{
   $(".single_row").each(function(){
     this.checked=false;
     eamil_list=[];
   })  
           
 }
 console.log(eamil_list);         
});
$(document).on('click', '.single_row', function() {

 if ($(this).is(":checked")){
   var isAllChecked = 0;
   $(".single_row").each(function(){
     if(!this.checked){
        isAllChecked = 1;
        
     }else{
        var list= $(this).attr('id');
        
     }
        
   })              
   if(isAllChecked == 0){ $("#checkedAllcheck").prop("checked", true); }     
 }else {
   $("#checkedAllcheck").prop("checked", false);
 }
 eamil_list=[];
 $(".single_row").each(function(){
       if(this.checked==true){
        var list= $(this).attr('id');
        eamil_list.push(list);
       }
       
   })
 console.log(eamil_list);         
});

//all sectionend

//ignore start
$(document).on('click', '#checkedAllcheckign', function() {
  eamil_list=[];
  if(this.checked){
   $(".single_rowign").each(function(){
        this.checked=true;
        var list= $(this).attr('id');
        eamil_list.push(list);
   })   
      
 }else{
   $(".single_rowign").each(function(){
     this.checked=false;
     eamil_list=[];
   })  
             
 }
 console.log(eamil_list);         
});
$(document).on('click', '.single_rowign', function() {

 if ($(this).is(":checked")){
   var isAllChecked = 0;
   $(".single_rowign").each(function(){
     if(!this.checked){
        isAllChecked = 1;
        
     }else{
        var list= $(this).attr('id');
        
     }
        
   })              
   if(isAllChecked == 0){ $("#checkedAllcheckign").prop("checked", true); }     
 }else {
   $("#checkedAllcheckign").prop("checked", false);
 }
 eamil_list=[];
 $(".single_rowign").each(function(){
       if(this.checked==true){
        var list= $(this).attr('id');
        eamil_list.push(list);
       }
       
   })
 console.log(eamil_list);         
});
//ign ends

//replied starts
$(document).on('click', '#checkedAllcheckrep', function() {
  eamil_list=[];
  if(this.checked){
   $(".single_rowrep").each(function(){
        this.checked=true;
        var list= $(this).attr('id');
        eamil_list.push(list);
   })   
      
 }else{
   $(".single_rowrep").each(function(){
     this.checked=false;
     eamil_list=[];
   })  
             
 }
 console.log(eamil_list);         
});
$(document).on('click', '.single_rowrep', function() {

 if ($(this).is(":checked")){
   var isAllChecked = 0;
   $(".single_rowrep").each(function(){
     if(!this.checked){
        isAllChecked = 1;
        
     }else{
        var list= $(this).attr('id');
        
     }
        
   })              
   if(isAllChecked == 0){ $("#checkedAllcheckrep").prop("checked", true); }     
 }else {
   $("#checkedAllcheckrep").prop("checked", false);
 }
 eamil_list=[];
 $(".single_rowrep").each(function(){
       if(this.checked==true){
        var list= $(this).attr('id');
        eamil_list.push(list);
       }
       
   })
 console.log(eamil_list);         
});
//replied endds

//important starts
$(document).on('click', '#checkedAllcheckimp', function() {
  eamil_list=[];
  if(this.checked){
   $(".single_rowimp").each(function(){
        this.checked=true;
        var list= $(this).attr('id');
        eamil_list.push(list);
   })   
      
 }else{
   $(".single_rowimp").each(function(){
     this.checked=false;
     eamil_list=[];
   })  
             
 }
 console.log(eamil_list);         
});
$(document).on('click', '.single_rowimp', function() {

 if ($(this).is(":checked")){
   var isAllChecked = 0;
   $(".single_rowimp").each(function(){
     if(!this.checked){
        isAllChecked = 1;
        
     }else{
        var list= $(this).attr('id');
        
     }
        
   })              
   if(isAllChecked == 0){ $("#checkedAllcheckimp").prop("checked", true); }     
 }else {
   $("#checkedAllcheckimp").prop("checked", false);
 }
 eamil_list=[];
 $(".single_rowimp").each(function(){
       if(this.checked==true){
        var list= $(this).attr('id');
        eamil_list.push(list);
       }
       
   })
 console.log(eamil_list);         
});
//importants ends







function sendmailcount(){
    var len=eamil_list.length;
    console.log(len);
    let txt="Total "+len+" email selected";
    $('#email_count').html(txt);
}
function sendmail(){
    var sub=$('#mail_subject').val();
    var text=$('#mail_text').val();
    $.ajax({
        type:'post',
        data:{'emails':eamil_list,"_token": "{{ csrf_token() }}",'subject':sub,'text':text},
        url:'{{url('admin/send_group_email')}}',
        success:function(data){
            if(data=='success'){
                location.reload();
            }
        }
    });
}
$('#mail_text').summernote({ 
    tabsize: 2,
    height: 300,  
});
</script>
@endsection