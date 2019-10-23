<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontBaseController;
use App\Job;
use App\Applicant;
use App\Application;
use App\Bower;
use App\Cv;
use App\Education;
use App\ExamHall;
use App\Experience;
use App\JobQuestion;
use App\Qfile;
use App\Qlong;
use App\Qsingle;
use App\Question;
use App\QuestionManagement;
use App\Qmulti;
use App\Qshort;
use App\TeacherCheck;
use Session;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CareerController extends FrontBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function index(){
        $this->pageTitle='Efoli';
        $today=Carbon::today();
        $this->jobs=Job::where('status',1)
                    ->orderBy('created_at','desc')
                    ->paginate(1);
                  
        return view('front.career.index',$this->data);
    }
    public function single($id){
        $this->pageTitle='Efoli';
        $this->job=Job::find($id);
        return view('front.career.single',$this->data);
    }
    public function applynow($id){
        $this->job=Job::find($id);
        $this->pageTitle='Apply for job';
        return view('front.career.apply',$this->data);
    }
    public function basic(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'address'=>'required',
        ]);
        
        $applicant=Applicant::where('email',$request->email)->first();
        if($applicant){
            $applicant->name=$request->name;
            $applicant->email=$request->email;
            $applicant->phone=$request->phone;
            $applicant->address=$request->address;
            $applicant->save();
        }else{
            $applicant= new Applicant;
            $applicant->name=$request->name;
            $applicant->email=$request->email;
            $applicant->phone=$request->phone;
            $applicant->address=$request->address;
            $applicant->save();
        }
        if(sizeof($request->institution)<1){
            return 'Education Required';
        }else{
            for($i=0;$i<sizeof($request->institution);$i++){
                $edu= new Education;
                $edu->institution=$request->institution[$i];
                $edu->passing_year=$request->passing[$i];
                $edu->cgpa=$request->result[$i];
                $edu->applicant_id=$applicant->id;
                $edu->save();
                
            }
        }
        if(sizeof($request->institution_ex)>0){
            for($i=0;$i<sizeof($request->institution_ex);$i++){
                $ex= new Experience;
                $ex->institution=$request->institution_ex[$i];
                $ex->designation=$request->designation_ex[$i];
                $ex->from=$request->from_ex[$i];
                $ex->to=$request->to_ex[$i];
                $ex->responsibility=$request->responsibilities_ex[$i];
                $ex->applicant_id=$applicant->id;
                $ex->save();
                
            }
        }
        if($request->hasFile('cv')){
            $cv=$request->file('cv');
            $path=public_path('/cv');
            $filename=time().rand(0,1000).'.'.$cv->getClientOriginalExtension();
            $cv->move($path, $filename);
            $new= new Cv;
            $new->file='/cv/'.$filename;
            $new->save();
           
        }
        $application= new Application;
        $application->job_id=$request->job_id;
        $application->applicant_id=$applicant->id;
        $application->cover_letter=$request->cover_letter;
        if(isset($new)){

            $application->cv_id=$new->id;
        }
        $application->save();
        $check=JobQuestion::where('job_id',$request->job_id)->count();
        if($check>0){
            
            return redirect('pre_exam/'.$applicant->id.'/'.$request->job_id.'/'.$application->id);
            
        }else{
            return redirect('thankyou');
        }
    }
    public function pre_exam($applicant_id,$job_id,$application_id){
            $this->pageTitle='Exam';
            $this->current_applicant_id=$applicant_id;
            $this->current_application_id=$application_id;
            $this->current_job_id=$job_id;
            return view('front.career.exam',$this->data);
    }
    public function start_exam($job_id,$applicant_id,$application_id){
        $this->pageTitle='Question';
        $browser = get_browser(null, true);
        $check=Bower::where('browser_name_regex',$browser['browser_name_regex'])
                     ->where('browser_name_pattern',$browser['browser_name_pattern'])
                     ->where('parent',$browser['parent'])
                     ->where('platform_description',$browser['platform_description'])
                     ->where('platform_bits',$browser['platform_bits'])
                     ->where('device_name',$browser['device_name'])->first();
        if($check){
            //already taken form the applicant with same browser
            //dami access 
            //     $now=time();
               
            //     $now=$now*1000;
            //     $question_id=JobQuestion::get_question_id($job_id);
            //     $question=Question::find($question_id);
            //     $total_marks=QuestionManagement::get_total_marks($question->id);
            //     $hall=ExamHall::where('applicant_id',$applicant_id)->where('question_id',$question_id)->where('job_id',$job_id)->first();
            //    // return $now+$question->time;
            //     if($hall==null){
            //         $hall= new ExamHall;
            //         $hall->start_time=$now;
            //         $hall->end_time=$now+$question->time;
            //         $hall->question_id=$question->id;
            //         $hall->applicant_id=$applicant_id;
            //         $hall->job_id=$job_id;
            //         $hall->marks=$total_marks;
            //         $hall->save();
            //     }
            // $this->hall=$hall;
            // $this->job_id=$job_id;
            // $this->application_id=$application_id;
            // $this->applicant_id=$applicant_id;
            // return view('front.career.question_paper',$this->data);
            //endof dami
            return 'your response has been taken.';
        }
        else{
            $check=Bower::where('applicant_id',$applicant_id)->first();
            if($check){
                //already taken from this applicant
                //dami access 
                // $this->job_id=$job_id;
                // $this->application_id=$application_id;
                // $this->applicant_id=$applicant_id;
                // return view('front.career.question_paper',$this->data);
                //endof dami
                return 'your response has been taken.';
            }
            else{
                //new applicant
                $bower= new Bower;
                $bower->applicant_id=$applicant_id;
                $bower->browser_name_pattern=$browser['browser_name_pattern'];
                $bower->browser_name_regex=$browser['browser_name_regex'];
                $bower->parent=$browser['parent'];
                $bower->platform_description=$browser['platform_description'];
                $bower->platform_bits=$browser['platform_bits'];
                $bower->device_name=$browser['device_name'];
                $bower->save();

                $now=time();
               
                $now=$now*1000;
                $question_id=JobQuestion::get_question_id($job_id);
                $question=Question::find($question_id);
                $total_marks=QuestionManagement::get_total_marks($question->id);
                $hall=ExamHall::where('applicant_id',$applicant_id)->where('question_id',$question_id)->where('job_id',$job_id)->first();
               // return $now+$question->time;
                if($hall==null){
                    $hall= new ExamHall;
                    $hall->start_time=$now;
                    $hall->end_time=$now+$question->time;
                    $hall->question_id=$question->id;
                    $hall->applicant_id=$applicant_id;
                    $hall->job_id=$job_id;
                    $hall->marks=$total_marks;
                    $hall->save();
                }
                $this->hall=$hall;
                $this->job_id=$job_id;
                $this->application_id=$application_id;
                $this->applicant_id=$applicant_id;
                return view('front.career.question_paper',$this->data);

            }
        }
         
    }
    public function submit_answer_sheet(Request $request){
     //   return $request;
        $this->validate($request,[
            'job_id'=>'required',
            'applicant_id'=>'required',
            'hall_id'=>'required',
            'question_id'=>'required'
        ]);
        $now=time();
        $now=$now*1000;
        $hall=ExamHall::find($request->hall_id);
        $hall->submission_time=$now;
        $hall->submission_time=$now;
        $hall->save();
        if($hall->submission_time > $hall->end_time){
            return 'Your Time was over. Soryy, We could accept the submission this time. We request you to lookup our website for future requirements, we are waiting for you next time .. ..';
        }
        $question_id=$request->question_id;
        $job_id=$request->job_id;
        $applicant_id=$request->applicant_id;
       
        $data=$request->toArray();
        foreach($data as $key=>$value){
            $teacher= new TeacherCheck;
            $teacher->question_id=$question_id;
            $teacher->job_id=$job_id;
            $teacher->applicant_id=$applicant_id;
            if(preg_match("/^single/",$key)){
                $ans=$value;
                $get_sep=preg_split("/^single/",$key);
                if($ans){
                    $q=Qsingle::find($get_sep[1]);
                    $teacher->sub_ques_type='App\Qsingle';
                    $teacher->sub_ques_id=$get_sep[1];
                    $teacher->submitted_answer=$value;
                    if($q->correnct_ans == $ans){
                        $teacher->gained_marks=$q->marks;
                    }
                    else{
                        $teacher->gained_marks=0.0;
                    }
                    $teacher->save();
                }
            }
            if(preg_match("/^multi/",$key)){
               
                // echo 'hi';
                $multi_ans=[];
                $get_sep=preg_split("/^multi/",$key);
             
                $q_id=preg_split("/key/",$get_sep[1]); // q_id[0]=>qesitn id
               
                for($i=0;$i<50;$i++){
                    $make_key='multi'.$q_id[0].'key'.$i;
                    if(array_key_exists ( $make_key ,  $data )){
                        array_push($multi_ans,$request->$make_key);
                        unset($data[$make_key]);
                       // print_r($multi_ans);
                    }
                }
                if(sizeof($multi_ans) > 0){
                    $q=Qmulti::find($q_id[0]);
                    $correct_ans_set=json_decode($q->correnct_ans_set);
                    $teacher->sub_ques_type='App\Qmulti';
                    $teacher->sub_ques_id=$q_id[0];
                    $teacher->submitted_answer=json_encode($multi_ans);
                  
                    if(sizeof($multi_ans)==0){
                        $teacher->gained_marks=0;
                    }else{
                        $right=array_intersect ( $multi_ans , $correct_ans_set );
                        $not_giver_cor=sizeof($correct_ans_set)-sizeof($right);
                        $wrong=sizeof(array_diff($multi_ans,$correct_ans_set));
                        $wrong=$wrong + $not_giver_cor;
                        $total_given=sizeof($multi_ans);
                        $per=sizeof($right)/(sizeof($right)+$wrong);
                        //print_r($per);die();
                        $marks=$q->marks*$per;
                        $marks=round($marks, 2);
                        $teacher->gained_marks=round($marks,3);
                    }
                    
                    $teacher->save();
                }
            }
            if(preg_match("/^short/",$key)){
                $ans=$value;
                $get_sep=preg_split("/^short/",$key);
                if($ans){
                    $q=Qshort::find($get_sep[1]);
                    $teacher->sub_ques_type='App\Qshort';
                    $teacher->sub_ques_id=$get_sep[1];
                    $teacher->submitted_answer=$value;
                    if(strlen($value)> $q->length){
                        $teacher->status='denied';
                        $teacher->gainded_marks=0;
                    }
                    $teacher->save();
                }
            }
            if(preg_match("/^long/",$key)){
                $ans=$value;
                $get_sep=preg_split("/^long/",$key);
                if($ans){
                    $q=Qlong::find($get_sep[1]);
                    $teacher->sub_ques_type='App\Qlong';
                    $teacher->sub_ques_id=$get_sep[1];
                    $teacher->submitted_answer=$value;
                    if(strlen($value)> $q->length){
                        $teacher->status='denied';
                        $teacher->gainded_marks=0;
                    }
                    $teacher->save();
                }
            }
            if(preg_match("/^file/",$key)){
                $ans=$value;
                $get_sep=preg_split("/^file/",$key);
                if($ans){
                    $q=Qfile::find($get_sep[1]);
                    $teacher->sub_ques_type='App\Qfile';
                    $teacher->sub_ques_id=$get_sep[1];
                    if($request->hasFile($key)){
                        $file=$request->file($key);
                        $filename=time().rand(0,1000).$file->getClientOriginalExtension();
                        $path=public_path('/ansfile');
                        $file->move($path, $filename);
                        $teacher->submitted_answer='ansfile/'.$filename;
                        $teacher->save();
                    }
                 
                   
                }
            }
        }

        Session::flash('thankyou','Thanks for your participatoin, We will contact you shortly');
        return redirect('thankyou');
    }
    public function test(){
        $browser = get_browser(null, true);
        echo "<pre>";
        print_r($browser);
    }
}
