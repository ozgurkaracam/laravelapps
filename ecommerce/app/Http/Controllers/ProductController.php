<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',['Products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            'name'=>'required|min:5',
            'category_id'=>'required',
            'description'=>'required|min:5',
            'price'=>'required|integer',
            'in_additional'=>'required',
            'image'=>'required|image|max:2500|mimes:jpeg,bmp,png',
            'subcategory_id'=>'integer'
        ]);
        $fileName=Str::random().'.'.$request->file('image')->extension();
        $request->file('image')->move('images',$fileName);
        $data['image']=$fileName;
        Product::create($data);
        notify()->success('Product Added!!!');
        return redirect()->route('products.index');
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
        $Product=Product::findOrFail($id);
        return view('admin.products.create',compact('Product'));
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
            'name'=>'required|min:5',
            'category_id'=>'required',
            'description'=>'required|min:5',
            'price'=>'required|integer',
            'in_additional'=>'required',
            'subcategory_id'=>'integer'
        ]);
        if($request->file('image')){
            $exname=Product::find($id)->image;
            $fileName=Str::random().".".$request->file('image')->extension();
            $data['image']=$fileName;
            $request->file('image')->move('images',$fileName);
            File::delete('images/'.$exname);

        }
        Product::findOrFail($id)->update($data);
        notify()->success($data['name'].' PRODUCT UPDATE!!!!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Product::find($id)->image;
        Product::find($id)->delete();
        File::delete('images/'.$image);

        notify()->success('Deleted Successfully!');
        return redirect()->back();
    }
}
