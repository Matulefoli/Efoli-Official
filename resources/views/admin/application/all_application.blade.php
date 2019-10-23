@extends('admin.layout')
@section('content')
<div class="col-xl-12 col-md-12 col-sm-12">
    <button  type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" >Send Email</button>
</div>  
<div class="col-xl-12 col-md-12 col-sm-12">
<table class="table">
        <thead>
            <th>
                <input type="checkbox" id="checkedAllcheck">
            </th>
            <th>
                Applicant name
            </th>
            <th>
                email <br>
                phone
            </th>
            <th>
                Address
            </th>
            <th>
                Educations
            </th>
            <th>
                Expericences
            </th>
            
            <th>
                Cover Latter
            </th>
            <th colspan="4">
                Attaned Exam name
            </th>
            <th></th>
            <th>
                Actions
            </th>

        </thead>
        <tbody>
            @foreach ($applications as $application)
            @php  
          
                $applicant=App\Applicant::find($application->applicant_id);
                $s=App\ShortList::where('job_id',$job_id)->where('applicant_id',$application->applicant_id)->count();
                   
            @endphp
            @if($applicant)
            <tr  >
                <td>
                    <input type="checkbox" class="single_row" id="{{$applicant->email}}">
                </td>
                <td>
                    {{$applicant->name}}
                </td>
                <td>
                    {{$applicant->email}}
                    <br>
                    {{$applicant->phone}}
                </td>
                <td>
                    {{$applicant->address}}
                </td>
                @php
                   $educations=App\Education::where('applicant_id',$applicant->id)->get();
                @endphp
                <td>
                   @if($educations)
                   @foreach($educations as $education)
                   <h3>INS: {{$education->institution}}</h3>
                   <hr>
                   <h4>Passing: {{$education->passing_year}}</h4>
                   <hr>
                   <h4>Grade: {{$education->cgpa}}</h4>
                   @endforeach
                   @endif
                </td>
                @php
                   $experiences=App\Experience::where('applicant_id',$applicant->id)->get();
                @endphp
                <td>
                        @if($experiences)
                        @foreach($experiences as $experience)
                        <h4>INS:{{$experience->institution}}</h4>
                        <hr>
                        <h5>Designation: {{$experience->designation}}</h5>
                        <hr>
                        <h6>Time: {{$experience->from}} To {{$experience->to}}</h6>
                        <hr>
                        responsibility:
                        @php
                            print_r($experience->responsibility)
                        @endphp
                        @endforeach
                        @endif
                </td>
                <td class="cover_letter">
                    {{$application->cover_letter}}
                </td>
                <td colspan="5">
                    @php
                        $attn=App\ExamHall::where('applicant_id',$applicant->id)->get();
                        $got_marks=App\TeacherCheck::gained_marks($job_id,$applicant->id);
                    @endphp
                    @if($attn)
                        @foreach($attn as $attn)
                            @php
                                $ques=App\Question::find($attn->question_id);
                            @endphp
                            @if($ques)
                            <i>Ques: {{$ques->name}}</i>
                            <hr>
                            <i>Marks: {{$got_marks}} /{{$attn->marks}} </i>
                            <hr>
                            <i>Time: {{$attn->created_at}} </i>
                            @endif
                        @endforeach
                    @endif
                </td>
                @php
                    
                @endphp
                <td>
                    <a href="{{url('admin/del_application/'.$application->id)}}" class="btn btn-sm btn-danger float-left">Delete</a>
                   
                    @if($s>0) 
                    <a href="{{url('admin/add_short_list/'.$application->applicant_id.'/'.$job_id)}}" class="btn btn-sm btn-warning float-left">UnList</a>
                    @else 
                    <a href="{{url('admin/add_short_list/'.$application->applicant_id.'/'.$job_id)}}" class="btn btn-sm btn-success float-left">Shortlist</a>
                    @endif
                    <a href="{{url('admin/see_answer_script/'.$application->applicant_id.'/'.$job_id)}}" class="btn btn-sm btn-info float-left">See Paper</a>
                </td>
            </tr>
            @endif
                
            @endforeach
        </tbody>
        {{$applications->links()}}
    </table>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <textarea name="" id="mail_text" class="form-control" cols="30" rows="10" placeholder="Type Message">

                </textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="event.preventDefault();send_efoli_mail();">Send</button>
            </div>
          </div>
        </div>
</div>
@endsection

@section('script')
<script>
   var eamil_list=[];
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
     if(!this.checked)
        isAllChecked = 1;
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

function send_efoli_mail(){
    var txt=$('#mail_text').val();
    $.ajax({
        type:'post',
        data:{'emails':eamil_list,'txt':txt,"_token": "{{ csrf_token() }}"},
        url:'{{url('admin/send_efoli_mail')}}',
        success:function(res){
            if(res=='success'){
                location.reload();
            }
        }
    })
}
$('#mail_text').summernote({ 
    tabsize: 2,
    height: 300,  
});
</script>
@endsection