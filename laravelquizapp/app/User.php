<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','pivot'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function quizzes(){
        return $this->belongsToMany('App\Quiz','user_quiz')->withTimestamps();
    }

    public function resultQuizzes(){
        return $this->belongsToMany('App\Quiz','results','user_id','quiz_id');
    }
    public function answers(){
        return $this->belongsToMany('App\Answer','results','user_id','answer_id');
    }
    public function completedQuizzes(){
        $arr=[];
        foreach ($this->resultQuizzes as $quiz){
                if(!in_array($quiz,$arr,false))
                    array_push($arr,$quiz);

        }
        return $arr;
    }
    public function unCompletedQuizzes(){
//        return array_diff($this->quizzes->toArray(),$this->completedQuizzes());
        $arr=[];
        foreach ($this->quizzes as $quiz){
            if(!in_array($quiz,$this->completedQuizzes(),false))
                array_push($arr,$quiz);

        }
        return $arr;
    }
    public function quizAnswers($quizid){
        $answers=[];
        foreach($this->answers as $answer){
            if($answer->question->quiz->id==$quizid)
                array_push($answers,$answer->makeHidden('question','pivot'));
        }
        return $answers;
    }
    public function answerquestion($questionid){
        $ans=null;
        foreach ($this->answers as $answer){
            if($answer->question->id == $questionid)
                $ans=$answer;
        }
        return $ans;
    }
    public function correctAnswers($quizid){
        $answers=[];
        foreach($this->answers as $answer){
            if($answer->question->quiz->id==$quizid && $answer->is_correct==true)
                array_push($answers,$answer->makeHidden('question','pivot'));
        }
        return $answers;

    }
}
