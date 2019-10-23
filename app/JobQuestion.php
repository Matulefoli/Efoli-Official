<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobQuestion extends Model
{
    public static function get_question_id($id){
        $jq=JobQuestion::where('job_id',$id)->first();
        if($jq){
            return $jq->question_id;
        }
    }
}
