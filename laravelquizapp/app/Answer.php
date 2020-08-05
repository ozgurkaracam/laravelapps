<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=['answer','question_id','is_correct'];

    public function question(){
        return $this->belongsTo('App\Question');
    }
    public function quiz(){
        return $this->question->quiz;
    }

    public static function correctAnswers(){
        $arr=[];
        foreach(Answer::all() as $answer){
            if($answer->is_correct==1)
                array_push($arr,$answer);
        }
        return $arr;
    }
}
