<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherCheck extends Model
{
    public static function gained_marks($job_id,$applicant_id){
        $marks=0;
        $teacher=TeacherCheck::where('job_id',$job_id)->where('applicant_id',$applicant_id)->get();
        if($teacher){
            foreach($teacher as $t){
                $marks=$marks+$t->gained_marks;
            }
            return $marks;
        }else{
            return 0;
        }
    }
}
