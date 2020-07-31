<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use foo\Foo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('foods.index',['foods'=>Food::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foods.create',['categories'=>Category::all()]);
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
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $file=$request->file('image');
        $fileName=rand().'.'. $file->getClientOriginalExtension();
        $file->move(public_path('images'),$fileName);
        $f=new Food();
        $f->name=$request->get('name');
        $f->description=$request->get('description');
        $f->price=$request->get('price');
        $f->category()->associate(Category::find($request->get('category')));
        $f->image=$fileName;
        $f->save();
        return view('foods.index',['foods'=>Food::all()])->with('message','Food created.');
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
        return view('foods.edit',['food'=>Food::find($id),'categories'=>Category::all()]);
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
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $file=$request->file('image');
        $fileName=rand().'.'. $file->getClientOriginalExtension();
        $file->move(public_path('images'),$fileName);
        $f=Food::find($id);
        $f->name=$request->get('name');
        $f->description=$request->get('description');
        $f->price=$request->get('price');
        $f->category()->associate(Category::find($request->get('category')));
//        dd($request->get('category'));
        $f->image=$fileName;
        $f->save();
        return view('foods.index',['foods'=>Food::all()])->with('message','Food created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::find($id)->delete();
        return redirect()->back()->with('message','Deleted Successfully!');
    }
    public function list(){
        $categories=Category::all();
        return view('foods.list',compact('categories'));
    }
}
