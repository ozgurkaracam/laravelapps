<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['question','quiz_id'];
    protected $with=['answers'];

    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }
    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
