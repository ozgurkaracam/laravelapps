<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=User::findOrFail(Auth::user()->id);
//        dd($user->quizzes);
        $quizzes=$user->unCompletedQuizzes();
        $completedQuizzes=$user->completedQuizzes();
        return view('home',compact(['quizzes','completedQuizzes']));
    }
    public function startQuiz($id){
        return view('quiz',['quiz'=>Quiz::findOrFail($id)]);
    }
}
