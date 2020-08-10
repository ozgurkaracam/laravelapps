<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index');
    }
    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
