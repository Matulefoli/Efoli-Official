<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Job;
use App\ImageGallery;
use Session;
class JobController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        
    }
    public function list(){
        $this->pageTitle='Job List';
        $this->jobs=Job::orderBy('created_at','desc')->paginate(1);
        return view('admin.job.joblist',$this->data);
    }
    public function add(){
        $this->pageTitle='Add Job';
        return view('admin.job.add',$this->data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'requirements'=>'required'
        ]);
        $job=Job::addJob($request);
        if($job=='success'){
            Session::flash('message','Successful');
            return redirect()->back();
        }
        else{
            Session::flash('message','Something Went Wrong');
            return redirect()->back()->withInput();
        }
    }
    public function delete(Request $request){
        Job::destroy($request->delete_job_id);
        return redirect()->back();
    }
    public function edit($id){
        $this->pageTitle='Edit a Job';
        $this->job=Job::find($id);
        return view('admin.job.edit',$this->data);
    }
    public function job_image_delete($request){
        ImageGallery::destroy($request);
        return redirect()->back();
    }
}
