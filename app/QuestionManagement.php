<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Qsingle;

class QuestionManagement extends Model
{
    public static function get_total_marks($id){
        $total=0;
        $all=QuestionManagement::where('question_id',$id)->get();
        foreach($all as $all){
            $q=$all->model_type::find($all->model_id);
            if($q){

                $total=$total+$q->marks;
            }
        }
        return $total;
    }
}
