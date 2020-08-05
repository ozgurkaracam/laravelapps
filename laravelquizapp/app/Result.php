<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table='results';
    protected $fillable=['quiz_id','user_id','question_id','answer_id'];
    public function quizzes(){
       return  $this->belongsTo('App\Quiz');
    }
    public function users(){
        return  $this->belongsTo('App\User');
    }
    public function questions(){
        return  $this->belongsTo('App\Question');
    }
    public function answers(){
        return  $this->belongsTo('App\Answer');
    }
}
