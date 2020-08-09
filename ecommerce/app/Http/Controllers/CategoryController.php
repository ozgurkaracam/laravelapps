<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',['categories'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required|min:5|unique:categories',
            'description'=>'required|min:5',
            'image'=>'image|max:2500|mimes:jpeg,bmp,png'
        ]);
        $imageName=Str::random(16).".".$request->file('image')->extension();
        $request->file('image')->move('images',$imageName);
        $category=new Category();
        $category->name=$request->name;
        $category->slug=Str::slug($category->name);
        $category->image=$imageName;
        $category->description=$request->description;
        $category->save();
        notify()->success('Category Created Successfully!');
        return redirect()->back();
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
        return view('admin.category.create',['category'=>Category::find($id)]);
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
            'name'=>'required|min:5',
            'description'=>'required|min:5'
        ]);
        $c=Category::findOrFail($id);
        if($request->file('image')!=null)
        {
            $request->validate([
                'image'=>'image|max:2500|mimes:jpeg,bmp,png'
            ]);
            File::delete('images/'.$c->image);
            $imageName=Str::random(16).'.'.$request->file('image')->extension();
            $c->image=$imageName;
            $request->file('image')->move('images',$imageName);
        }
        $c->name=$request->name;
        $c->slug=Str::slug($request->name);
        $c->description=$request->description;
        $c->save();

        notify()->success('Category Edited Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        notify()->success('Category Deleted Successfully!');
        return redirect()->back();
    }
}
