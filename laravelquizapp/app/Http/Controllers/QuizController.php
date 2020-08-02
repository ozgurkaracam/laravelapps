<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Alert::success('Success Title', 'Success Message');
        return view('admin.quizzes.index',['quizzes'=>Quiz::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->vualidate($request);
        Quiz::storeQuiz($request->except('_token'));

        return redirect(route('quizzes.index'))->with('success','Created Successfully!');
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

        return view('admin.quizzes.create',['edit'=>true,'quiz'=>Quiz::find($id)]);
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
        $this->vualidate($request);
        Quiz::find($id)->update($request->except('_token'));
        return redirect(route('quizzes.index'))->with('success','Updated Successfuly!');
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

    public function vualidate($request){
        $request->validate([
            'name'=>'required|min:5',
            'description'=>'required|min:5',
            'duration'=>'required|integer'
        ]);
    }
}
