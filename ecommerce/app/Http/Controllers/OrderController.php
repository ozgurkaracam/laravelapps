<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('admin.orders.index',['orders'=>Order::all()]);
    }
    public function show($id){
        return view('admin.orders.index',['orders'=>User::findOrFail($id)->orders,'user'=>User::find($id)]);
    }
}
