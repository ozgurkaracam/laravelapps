<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table='results';
    protected $fillable=['quiz_id','user_id','question_id','answer_id'];
    public function quizzes(){
       return  $this->belongsToMany('App\Quiz');
    }
}
