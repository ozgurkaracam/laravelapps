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

    public function completedQuizzes(){
        return $this->belongsToMany('App\Quiz','results','user_id','quiz_id');
    }
    public function unCompletedQuizzes(){
        $allQuizzes=[];
        foreach ($this->quizzes as $quiz)
            array_push($allQuizzes,$quiz);
        $complatedQuizzes=[];
        foreach ($complatedQuizzes as $quiz)
            array_push($complatedQuizzes,$quiz);
        $son=array_diff($allQuizzes,$complatedQuizzes);
        return $son;
    }
}
