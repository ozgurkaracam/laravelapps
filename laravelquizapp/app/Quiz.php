<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable=['name','description','duration'];
    protected $hidden=['pivot'];

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public static function storeQuiz($request){
        return Quiz::create($request);
    }
    public function users(){
        return $this->belongsToMany('App\User','user_quiz')->withTimestamps();
    }

}
