<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quiz)
    {
        return view('admin.questions.index',['questions'=>Quiz::find($quiz)->questions,'quiz'=>Quiz::find($quiz)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create',['quizzes'=>Quiz::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'=>'required|min:5',
            'answer'=>'required|array',
            'quiz'=>'required',
            'correct_answer'=>'required'
        ]);
//        dd($request->all());
        $q=new Question();
        $q->question=$request->question;
        $q->quiz()->associate(Quiz::find($request->quiz));
        $q->save();
        foreach ($request->answer as $key=>$answer){
            $a=new Answer();
            $a->answer=$answer;
            $request->correct_answer == $key ? $a->is_correct=true : $a->is_correct=false;
            $q->answers()->save($a);
        }
        return 'OK';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
