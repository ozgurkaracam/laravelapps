<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Quiz;
use App\Result;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.questions.index',['questions'=>Quiz::findOrFail($quiz)->questions,'quiz'=>Quiz::findOrFail($quiz)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz=null)
    {
        return view('admin.questions.create',['quizzes'=>Quiz::all()]);
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
        $q->quiz()->associate(Quiz::findOrFail($request->quiz));
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
        return view('admin.questions.create',['quizzes'=>Quiz::all(),'question'=>Question::findOrFail($id)]);
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
        $question=Question::findOrFail($id);
        $question->quiz()->associate(Quiz::findOrFail($request->quiz));
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
        $idd=Question::findOrFail($id)->quiz->id;
        $question=Question::findOrFail($id);
        $question ? $question->delete() : null;
        return redirect()->route('quizzes.questions',$idd)->with('success','Question and Answers Delete!!!');
    }
    public function storeresult(Request $request,$quiz){
        $question=$request->question;
        $answer=$request->answer;
        $user=Auth::user()->id;
        Result::updateOrCreate(
            ['question_id'=>$question],
            ['user_id'=>$user,'answer_id'=>$answer,'quiz_id'=>$quiz]

        );
        return response()->json(['message'=>'OK'],200);
    }
}
