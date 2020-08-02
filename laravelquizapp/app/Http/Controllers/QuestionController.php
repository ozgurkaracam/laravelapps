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
    public function index()
    {
            return view('admin.questions.index',['questions'=>Question::all()]);
    }
    public function quizQuestion($quiz){
        return view('admin.questions.index',['questions'=>Quiz::find($quiz)->questions,'quiz'=>Quiz::find($quiz)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz=null)
    {
        $quizz=Quiz::find($quiz);
        return view('admin.questions.create',['quizzes'=>Quiz::all(),'quizz'=>$quizz ]);
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
            'answer.*'=>'required|min:5',
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
        return view('admin.questions.create',['quizzes'=>Quiz::all(),'question'=>Question::find($id)]);
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
        $request->validate([
            'question'=>'required|min:5',
            'answer'=>'required|array',
            'answer.*'=>'required|min:5',
            'quiz'=>'required',
            'correct_answer'=>'required'
        ]);
        $question=Question::find($id);
        $question->quiz()->associate(Quiz::find($request->quiz));
        $question->question=$request->question;
        $question->save();
        for($i=0;$i<4;$i++){
            $question->answers[$i]->answer=$request->answer[$i];
            $i==$request->correct_answer ? $question->answers[$i]->is_correct = true : $question->answers[$i]->is_correct = false ;
            $question->answers[$i]->save();
        }
        return redirect()->route('quizzes.questions',$question->quiz->id)->with('success','Question and Answers Update!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idd=Question::find($id)->quiz->id;
        $question=Question::find($id);
        $question ? $question->delete() : null;
        return redirect()->route('quizzes.questions',$idd)->with('success','Question and Answers Delete!!!');
    }
}
