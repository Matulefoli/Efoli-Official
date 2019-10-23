@extends('front.layout')
@section('preloader')
@include('front.preloader')
@endsection
@section('content')

<section class="app_featured_area">
        <div class="container">
                <section class="breadcrumb_area" style="background-image: url('{{asset('157113007778.jpg')}}'); background-position:  center center; background-repeat: no-repeat; background-size: cover;">
                  
                    <div class="container">
                        <div class="breadcrumb_content text-center">
                            <h1 class="f_p f_700 f_size_50 w_color l_height50 mb_20" style="color:black">Job apply</h1>
                           
                        </div>
                    </div>
                </section>
                <section class="job_apply_area sec_pad bg_color">
                    <div class="container">
                        <div class="row flex-row-reverse">
                            <div class="col-lg-4 pl_70">
                                <div class="job_info">
                                    <div class="info_head">
                                        <i class="ti-receipt"></i>
                                        <h6 class="f_p f_600 f_size_18 t_color3">Job Detail</h6>
                                    </div>
                                    <div class="info_item">
                                        <i class="ti-ruler-pencil"></i>
                                        <h6>{{$job->title}}</h6>
                                       
                                    </div>
                                    
                                    <div class="info_item">
                                        <i class="ti-layout-tab-window"></i>
                                        <h6>Requirements:</h6>
                                        <p>
                                            @php
                                                print_r($job->requirement);
                                            @endphp
                                        </p>
                                    </div>
                                    <div class="info_item">
                                        <i class="ti-pencil-alt"></i>
                                        <h6>Special Note</h6>
                                        <p>
                                            @php
                                                print_r($job->special_note);
                                            @endphp
                                        </p>
                                    </div>
                                    <div class="info_item">
                                        <i class="ti-cup"></i>
                                        <h6>Salary</h6>
                                        <p>
                                            {{$job->salary_note}}
                                        </p>
                                    </div>
                                    <div class="info_item">
                                        <i class="ti-ruler-pencil"></i>
                                        <h6>Vacancy</h6>
                                        <p>
                                            @php
                                                print_r($job->vacancy);
                                            @endphp
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="job_apply">
                                    <div class="sec_title mb_70">
                                        <h3 class="f_p f_size_22 f_600 t_color3 mb_20">Apply Now</h3>
                                        
                                    </div>
                                    <form action="{{route('send_basic_info')}}" class="row apply_form" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{$job->id}}">
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="name" placeholder="Your Name" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="email" placeholder="Your Email" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <input type="text" name="phone" placeholder="Phone Number" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                                <input type="text" name="address" placeholder="Address" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <textarea name="cover_letter" id="message" cols="30" rows="10" placeholder="Cover Letter"></textarea>
                                        </div>
                                        <div class="form-group col-md-12 col-lg-12" id="education">
                                                <button class="btn btn-info" onclick="event.preventDefault();add_education();">Add Education</button>
                                                <div class="form-group">
                                                    <label for="">Institution Name</label>
                                                    <input type="text" name="institution[]" class="form-control" placeholder="Institution Name" required>
                                                    <label for="">Passing Year</label>
                                                    <input type="date" name="passing[]" class="form-control" placeholder="Passing Year" required>
                                                    <label for="">Result</label>
                                                    <input type="number" name="result[]" class="form-control" placeholder="Result" required>
                                                </div><hr>
                                           
                                        </div>
                                        <div class="form-group col-md-12 col-lg-12" id="experience">
                                                <button class="btn btn-info" onclick="event.preventDefault();add_experience();">Add Experience</button>
                                                <div class="form-group">
                                                    <label>Institution Name</label>
                                                    <input type="text" name="institution_ex[]" class="form-control" placeholder="Institution Name">
                                                    <label>Designation</label>
                                                    <input type="text" name="designation_ex[]" class="form-control" placeholder="Designation">
                                                    <label for="">From</label>
                                                    <input type="date" name="from_ex[]" class="form-control" placeholder="From">
                                                    <label for="">To</label>
                                                    <input type="date" name="to_ex[]" class="form-control" placeholder="To">
                                                    <label>Responsibilities</label>
                                                    <textarea class="form-control" name="responsibilities_ex[]" placeholder="Responsibilities">

                                                    </textarea>
                                                    <hr>
                                                </div>
                                           
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <div class="upload_box"> Upload Your Resume Here :
                                                <input type="file" name="cv" id="File">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <p>
                                                @php
                                                    $check=App\JobQuestion::where('job_id',$job->id)->count();
                                                @endphp
                                                @if($check>0)
                                                This Application Process contain an quick test. Without participating on that test will autometically disqualify a candidate.
                                                @endif
                                            </p>
                                            <button type="submit" class="btn_three">Apply Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
</section>
@endsection
@section('admin_script')
<script>
function add_education(){
 
    let node=document.createElement("div");
    node.innerHTML="<label>Institution Name </label>"+"<input class='form-control' placeholder='Institution Name' type='text' "+" name=institution[] required >"+
                    "<label>Passing Year</label>"+"<input class='form-control' type='date' placeholder='Passing Year' name='passing[]' required>"+
                    "<label >Result</label>"+"<input type='number' class='form-control' placeholder='Result' name='result[]' required>" +"<hr>";
    let parent=document.getElementById('education');
    parent.appendChild(node);
}
function add_experience(){
    let node=document.createElement("div");
    node.innerHTML="<label>Institution Name</label>"+"<input class='form-control' placeholder='Institution Name' type='text' "+" name=institution_ex[] >"+
                    +"<label>Designation</label>"+"<input type='text' class='form-control' name='designation_ex[]' placeholder='Designation' >"+
                    "<label>From</label>"+"<input class='form-control' type='date' placeholder='From' name='from_ex[]' >"+
                    "<label >To</label>"+"<input type='date' class='form-control' placeholder='To' name='to_ex[]' >"+
                    " <label>Responsibilities</label>" + "<textarea class='form-control' placeholder='Responsibilities' name='responsibilities_ex[]' > </textarea>"  +"<hr>";
    let parent=document.getElementById('experience');
    parent.appendChild(node);
}
</script>
@endsection