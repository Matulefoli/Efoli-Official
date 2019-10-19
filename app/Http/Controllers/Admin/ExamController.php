<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Job;
use App\Question;
use App\Qpaper;
use App\Http\Controllers\Admin\AdminBaseController;

class ExamController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function add(){
        $this->pageTitle='Job List';
        $this->jobs=Job::orderBy('created_at','desc')->get();
        return view('admin.exam.add',$this->data);
    }
    public function select_question(Request $request){
        $this->validate($request,[
            'job'=>'required',
            'type'=>'required'
        ]);
        $question=new Question;
        $question->job_id=$request->job;
        $question->type=$request->type;
        $question->setter=$request->setter;
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
        if($request->type=='contest_contest'){
         
            return redirect()->action(
                'Admin\ExamController@contest_setup', ['id' => $question->id]
            );
        }
        elseif($request->type=='single'){
            return redirect()->action(
                'Admin\ExamController@single_setup', ['id' => $question->id]
            );
        }
        else{
            return redirect()->action(
                'Admin\ExamController@multipe_setup', ['id' => $question->id]
            );
        }
    }
    public function contest_setup($id){
        $this->pageTitle='Contest Setup';
        $this->question_id=$id;
        return view('admin.exam.contest_setup',$this->data);
    }
    public function single_setup($id){
        $this->pageTitle='Single Setup';
        $this->question_id=$id;
        return view('admin.exam.single_setup',$this->data);
    }
    public function multipe_setup($id){
        $this->pageTitle='Multiple Setup';
        $this->question_id=$id;
        return view('admin.exam.multiple',$this->data);
    }
    public function paper_save(Request $request){
        $this->validate($request,[
            'question_id'=>'required'
        ]);
        $qu=Question::find($request->question_id);
        if($qu->type=='contest_contest'){
            $paper= new Qpaper;
            if($request->hasFile('question')){
                $file=$request->file('question');
                $path=public_path('question');
                $filename=time().rand(0,1000).'.'.$file->getClientOriginalExtension();
                $file->move($path, $filename);
                $paper->file='question/'.$filename;
            }
            if($request->hasFile('answer')){
                $file=$request->file('answer');
                $path=public_path('answer');
                $filename=time().rand(0,1000).'.'.$file->getClientOriginalExtension();
                $file->move($path, $filename);
                $paper->ans_file='answer/'.$filename;
            }
            $paper->marks=$request->marks;
            $paper->question_id=$request->question_id;
            $paper->type=$qu->type;
            $paper->save();
        }
        elseif($qu->type=='single'){
            $paper= new Qpaper;
            if($request->hasFile('question')){
                $file=$request->file('question');
                $path=public_path('question');
                $filename=time().rand(0,1000).'.'.$file->getClientOriginalExtension();
                $file->move($path, $filename);
                $paper->file='question/'.$filename;
            }
            $paper->question_id=$request->question_id;
            $paper->marks=$request->marks;
            $paper->type=$qu->type;
            $paper->save();
        }
        else{
            if($request->question[0]!=null){
                for($i=0;$i<sizeof($request->question);$i++){
                    $paper= new Qpaper;
                    $paper->type=$qu->type;
                    $paper->question_id=$request->question_id;
                    $paper->A=$request->a[$i];
                    $paper->B=$request->b[$i];
                    $paper->C=$request->c[$i];
                    $paper->D=$request->d[$i];
                    $ans=$request->answer[$i];
                    $ans_arr=explode('*/*',$ans);
                    $paper->ans_file=json_encode($ans_arr);
                    $paper->question=$request->question[$i];
                    $paper->marks=$request->marks[$i];
                    $paper->save();
                }
            }
        }
        return redirect(route('exams'));
    }
    public function view(){
        $this->pageTitle='Exams';
        $this->delete_unused();
        $this->questions=Question::orderBy('created_at','desc')->paginate(1);
        return view('admin.exam.exams',$this->data);
    }
    public function delete_unused(){
        $question=Question::get(['id'])->toArray();
        foreach($question as $niddle){
            if( Qpaper::where('question_id',$niddle)->count()<1){
                Question::destroy($niddle);
            }
          
        }
    }
    public function delete(Request $request){
        if($request->delete_ques_id){
            $paper=Qpaper::where('question_id',$request->delete_ques_id)->get();
            $question=Question::destroy($request->delete_ques_id);
          
            foreach($paper as $p){
                $p->delete();
            }
            return redirect()->back();
        }
    }
}
