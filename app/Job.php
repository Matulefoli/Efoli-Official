<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
    public static function addJob($data){
        try{
            if(isset($data->edit_job_id)){
                $job=Job::find($data->edit_job_id);
            }else{
                $job=new Job;
            }
          
            $job->title=$data->title;
            $job->description=$data->description;
            $job->responsibilty=$data->responsibility;
            $job->requirement=$data->requirements;
            $job->application_process=$data->application_process;
            $job->special_note=$data->special_note;
            $job->start_date=$data->start_date;
            $job->expiration_date=$data->end_date;
            $job->vacancy=$data->vacancy;
            $job->status=$data->status;
            $job->salary_note=$data->salary;
            $job->save();
            foreach($data->file('image') as $image){
                $path=public_path('/job/image');
                $filename=time().rand(0,1000).'.'.$image->getClientOriginalExtension();
                $image->move($path, $filename);
                $img= new ImageGallery;
                $img->model_type='App\Job';
                $img->model_id=$job->id;
                $img->image='/job/image/'.$filename;
                $img->save();
            }
            return 'success';
        }
        catch(Exception $ch){
            return $ch;
        }
        
    }
}
