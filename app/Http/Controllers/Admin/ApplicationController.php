<?php

namespace App\Http\Controllers\Admin;

use App\Application;
use App\ExamHall;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use Session;
use App\Job;
use App\ShortList;
use App\Jobs\EfoliMail;

class ApplicationController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function all_application(){
        $this->pageTitle='All Applications';
        $this->jobs=Job::where('status',1)->orderBy('created_at','desc')->paginate(10);
        return view('admin.application.view',$this->data);

    }
    public function get_all_applications($id){
        $this->pageTitle='All Applications For a single job';
        $this->job_id=$id;
        $this->applications=Application::where('job_id',$id)->paginate(20);
        return view('admin.application.all_application',$this->data);
    }
    public function del_application($id){
        Application::destroy($id);
        Session::flash('message','Success');
        return redirect()->back();
    }
    public function add_short_list($applicant_id,$job_id){
        $short=ShortList::where('applicant_id',$applicant_id)->where('job_id',$job_id)->first();
        if($short){
            $short->delete();
        }else{
            $short= new ShortList;
            $short->applicant_id=$applicant_id;
            $short->job_id=$job_id;
            $short->save();
        }
        Session::flash('message','Success');
        return redirect()->back();
    }
    public function see_answer_script($applicant_id,$job_id){
        $hall=ExamHall::where('applicant_id',$applicant_id)->where('job_id',$job_id)->first();
        if($hall){
            $this->hall=$hall;
            $this->pageTitle='Script';
            return view('admin.application.script',$this->data);
        }else{
            return 'this participant did not attened the exam for this job';
        }

    }
    public function all_short_list_get($id){
        $this->pageTitle='All Shortlist For a single job';
        $this->job_id=$id;
        $this->shortlists=ShortList::where('job_id',$id)->paginate(20);
      
        return view('admin.application.shortlisted_job',$this->data);
    }
    public function send_efoli_mail(Request $request){
        $receivers=[];
        $text=$request->txt;
        if($request->emails){
            foreach($receivers as $key=>$receiver){
                array_push($receivers,$receiver);
            }
        }
        EfoliMail::dispatch($receivers,$text);
        return 'success';
    }
}
