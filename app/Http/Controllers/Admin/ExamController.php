<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Job;
use App\Question;
use App\Qpaper;
use App\Qmulti;
use App\Qsingle;
use App\Qshort;
use App\Qfile;
use App\Http\Controllers\Admin\AdminBaseController;
use App\JobQuestion;
use App\Qlong;
use App\QuestionManagement;
use Illuminate\Support\Facades\Session;

class ExamController extends AdminBaseController
{
    protected $serial_variable;
    public function __construct() {
        parent::__construct();
        $this->serial_variable=1;
        
        
    }
    public function add(){
        $this->pageTitle='Job List';
        $this->jobs=Job::orderBy('created_at','desc')->get();
        return view('admin.exam.add',$this->data);
    }
    public function select_question(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $question=new Question;
        $question->name=$request->name;
        $question->status=$request->status;
        $time=0;
        if($request->ss){
            $time=$request->ss;
        }
        if($request->mm){
            $time=$time+$request->mm*60;
        }
        if($request->hh){
            $time=$time+$request->hh*60*60;
        }
        if($time==0){return 'time needed';}
        $militime=$time*1000;
        $question->time=(string)$militime;
   
        $question->save();
        return redirect()->route('set_question', ['id' => $question->id]);
       
      
    }
    public function set_question($id){
        $this->pageTitle='Question Setup';
        $this->question_id=$id;
        if(!Session::has('i')){
            Session::put('i',0);
        }
        else{
            $variable=Session::get('i');
            $variable++;
            Session::put('i',$variable);
        }
        return view('admin.exam.question_setup',$this->data);
    }
    public function make_question(Request $request){
        if($request->type=='single'){
            $view= view('admin.exam.single_setup');
        }
        elseif($request->type=='multiple'){
            $view= view('admin.exam.multiple');
        }elseif($request->type=='short'){
            $view= view('admin.exam.shortans');
        }
        elseif($request->type=='long'){
            $view= view('admin.exam.longans');
        }elseif($request->type=='file'){
            $view= view('admin.exam.file');
        }

        return $view;
    }
    public function attach_to_job(Request $request){
        $chekc=JobQuestion::where('job_id',$request->job_id)->first();
        if($chekc){
            $chekc->delete();
        }
        $attachment=JobQuestion::where('job_id',$request->job_id)->where('question_id',$request->question_id)->first();
        if($attachment){
            $attachment->delete();
        }
        else 
        {
            $new= new JobQuestion;
            $new->job_id=$request->job_id;
            $new->question_id=$request->question_id;
            $new->save();
        }
        Session::flash('message','Successful');
        return redirect()->back();
    }
  
    public function paper_save(Request $request){
        $data=$request->toArray();
        $question_id=$data['question_id'];
        foreach($data as $key=>$value){
            
            if(preg_match("/^singlequestion/",$key)){
                $get_sep=preg_split("/^singlequestion/",$key);
                $answer_ser=[];
                $str='singleans'.$get_sep[1];
                $make_question='singlequestion'.$get_sep[1];
                $make_mark='marks'.$get_sep[1];
                $make_cor='answer'.$get_sep[1];
                foreach($request->$str as $res){
                    
                    array_push($answer_ser,$res);

                }
                if($request-> $make_question==null){continue;}
                $q= new Qsingle;
                //$q->question_id=$question_id;
                $q->answer_set=json_encode($answer_ser);
                $q->question=$request->$make_question;
                $q->marks=$request->$make_mark;
                $q->correnct_ans=$request->$make_cor;
                $q->save();
                $s= new QuestionManagement;
                $s->serial=$this->serial_variable;
                $s->question_id=$question_id;
                $s->model_type='App\Qsingle';
                $s->model_id=$q->id;
                $s->save();
                $this->serial_variable++;
            }
            if(preg_match("/^multiquestion/",$key)){
                $get_sep=preg_split("/^multiquestion/",$key);
                $answer_ser=[];
                $str='multians'.$get_sep[1];
                $make_question='multiquestion'.$get_sep[1];
                $make_mark='marks'.$get_sep[1];
                $make_cor='answer'.$get_sep[1];
                foreach($request->$str as $res){
                    
                    array_push($answer_ser,$res);

                }
                if($request->$make_question==null){continue;}
                $q= new Qmulti;
               // $q->question_id=$question_id;
                $q->answer_set=json_encode($answer_ser);
                $q->question=$request->$make_question;
                $q->marks=$request->$make_mark;
                $ans_arr=explode('*/*',$request->$make_cor);
                $q->correnct_ans_set=json_encode($ans_arr);
                $q->save();
                $s= new QuestionManagement;
                $s->serial=$this->serial_variable;
                $s->question_id=$question_id;
                $s->model_type='App\Qmulti';
                $s->model_id=$q->id;
                $s->save();
                $this->serial_variable++;
            }
            if(preg_match("/^longquestion/",$key)){
                $get_sep=preg_split("/^longquestion/",$key);
                $make_question='longquestion'.$get_sep[1];
                $make_mark='marks'.$get_sep[1];
                $make_cor='answer'.$get_sep[1];
                $make_len='len'.$get_sep[1];
                if($request->$make_question==null){continue;}
                $q=new Qlong;
              //  $q->question_id=$question_id;
                $q->question=$request->$make_question;
                $q->marks=$request->$make_mark;
                $q->correct_ans=$request->$make_cor;
                $q->length=$request->$make_len;
                $q->save();
                $s= new QuestionManagement;
                $s->serial=$this->serial_variable;
                $s->question_id=$question_id;
                $s->model_type='App\Qlong';
                $s->model_id=$q->id;
                $s->save();
                $this->serial_variable++;
            }
            if(preg_match("/^shortquestion/",$key)){
                $get_sep=preg_split("/^shortquestion/",$key);
                $make_question='shortquestion'.$get_sep[1];
                $make_mark='marks'.$get_sep[1];
                $make_cor='answer'.$get_sep[1];
                $make_len='len'.$get_sep[1];
                if($request->$make_question==null){continue;}
                $q=new Qshort;
               // $q->question_id=$question_id;
                $q->question=$request->$make_question;
                $q->marks=$request->$make_mark;
                $q->correct_ans=$request->$make_cor;
                $q->length=$request->$make_len;
                $q->save();
                $s= new QuestionManagement;
                $s->serial=$this->serial_variable;
                $s->question_id=$question_id;
                $s->model_type='App\Qshort';
                $s->model_id=$q->id;
                $s->save();
                $this->serial_variable++;
            }
            if(preg_match("/^filequestion/",$key)){
                $get_sep=preg_split("/^filequestion/",$key);
                $make_question='filequestion'.$get_sep[1];
                $make_mark='marks'.$get_sep[1];
                $make_cor='answer'.$get_sep[1];
                $q=new Qfile;
               // $q->question_id=$question_id;
            
                if($request->hasFile($make_question)){
                    $file=$request->file($make_question);
                    $path=public_path('/questionfile');
                    $filename=time().rand(0,1000).'.'.$file->getClientOriginalExtension();
                    $file->move($path, $filename);
                    $q->question='questionfile/'.$filename;
                    $q->marks=$request-> $make_mark;
                    if($request->hasFile($make_cor)){
                        $file=$request->file($make_cor);
                        $path=public_path('/questionfile');
                        $filename=time().rand(0,1000).'.'.$file->getClientOriginalExtension();
                        $file->move($path, $filename);
                        $q->question='questionfile/'.$filename;
                    }
                  
                    $q->save();
                    $s= new QuestionManagement;
                    $s->serial=$this->serial_variable;
                    $s->question_id=$question_id;
                    $s->model_type='App\Qfile';
                    $s->model_id=$q->id;
                    $s->save();
                    $this->serial_variable++;
                }
              
            }
        }
       
        return redirect(route('all_question'));
    }
    public function all_question(){
            $this->pageTitle='Question';
            $this->jobs=Job::where('status',1)->orderBy('created_at','desc')->get();
            $this->delete_unused();
            $this->questions=Question::orderBy('created_at','desc')->paginate(1);
            return view('admin.exam.all_question',$this->data);
    }
    // public function view(){
    //     $this->pageTitle='Exams';
    //   //  $this->delete_unused();
    //     $this->questions=Question::orderBy('created_at','desc')->paginate(1);
    //     return view('admin.exam.exams',$this->data);
    // }
    public function see_question($id){
        $this->pageTitle='Question';
        
        $this->question=Question::find($id);
        return view('admin.exam.single_question_view',$this->data);
    }
    public function delete_unused(){
        $question=Question::get(['id'])->toArray();
        foreach($question as $niddle){
            if( QuestionManagement::where('question_id',$niddle)->count()<1){
                Question::destroy($niddle);
            }
          
        }
    }
    public function delete($id){
        Question::destroy($id);
        $chekc=JobQuestion::where('question_id',$id)->get();
        if($chekc){
            $chekc->delete();
        }
        if($chekc){
            $chekc->delete();
        }
        Session::flash('message','Successful');
        return redirect()->back();
    }
    public function active_deactive_question($id){
        $question=Question::find($id);
        if($question->status==1){
            $question->status=0;
            $chekc=JobQuestion::where('question_id',$id);
            if($chekc){
                $chekc->delete();
            }
        }
        else{
            $question->status=1;
        }
        $question->save();
        Session::flash('message','Successful');
        return redirect()->back();
      
    }
}
