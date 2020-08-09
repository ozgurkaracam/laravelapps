<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subcategories.index',['subcategories'=>Subcategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        return view('admin.subcategories.create',['categoryid'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|min:5|max:200',
            'category_id'=>'required'
        ]);
        try{

            Subcategory::create($data);
            notify()->success('Subcategory Added!!!!');
        }catch (\Exception $e){
            notify()->error('Error!!');
        }
        return redirect()->route('subcategories.show',$data['category_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::findOrFail($id);
        return view('admin.subcategories.index',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.subcategories.create',['subcategory'=>Subcategory::find($id)]);
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
        $data=$request->validate([
            'name'=>'required|min:5|max:200',
            'category_id'=>'required'
        ]);
        try{

            Subcategory::findOrFail($id)->update($data);
            notify()->success('Subcategory Edited!!!!');
        }catch (\Exception $e){
            notify()->error('Error!!');
        }
        return redirect()->route('subcategories.show',$data['category_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=Subcategory::find($id);
        $category_id=$subcategory->category->id;
        $subcategory->delete();
        notify()->success('Subcategory deleted!');
        return redirect()->route('subcategories.show',$category_id);
    }

    public function loadSubcategories($id){
        return response()->json(Category::findOrFail($id)->subcategories,200);
    }
}
