<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Sodium\add;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index',['users'=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->vall($request);
        $data['password']=Hash::make($data['password']);
        User::create($data);
        return redirect()->route('users.index')->with('message','user update succesfully!');
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

    public function UsersQuizzes(){
        return view('admin.users.quizzes',['users'=>User::all()]);
    }
    public function UserQuizzes($id){
        return view('admin.users.quiz',['user'=>User::find($id)]);
    }
    public function updateQuizzes(Request $request,$id){
        $user=User::findOrFail($id);
        User::findOrFail($id)->quizzes()->detach();
        if($request->quizzes!=null){
            foreach ($request->quizzes as $quiz)
                User::findOrFail($id)->quizzes()->attach(Quiz::findOrFail($quiz));
        }
        return redirect()->back()->with('message',$user->name.' Exams Update Succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            return view('admin.users.create',['user'=>User::find($id)]);
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
        $data=$this->vall($request);
        $data['password']=Hash::make($data['password']);
        User::findOrFail($id)->update($data);
        return redirect()->back()->with('message','user update succesfully!');
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
    public function vall(Request $request){
        return $request->validate([
           'name'=>'required|min:5',
            'email'=>'required|min:5|email',
            'password'=>'required|min:5|confirmed',
            'is_admin'=>'required'
        ]);
    }
}
