<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     public function question_management(){
         return $this->hasMany('App\QuestionManagement','question_id');
     }
}
