<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use App\User;

class ResultController extends Controller
{
    public function index(){
            return view('admin.results.index',['users'=>User::all()]);
    }
    public function result($quizid,$userid){
        return view('admin.results.result',['quiz'=>Quiz::find($quizid),'user'=>User::find($userid)]);
    }
}
