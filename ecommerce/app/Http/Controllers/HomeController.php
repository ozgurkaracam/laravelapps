<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['products'=>Product::orderBy('id','DESC')->paginate(6)]);
    }
    public function getProductsByCategory($slug){
        $catid=Category::where('slug',$slug)->first()->id;
//        $s=new Collection(Category::where('slug',$slug)->first()->products->sortByDesc('id'));
        $products=Product::where('category_id',$catid)->orderByDesc('id');
        return view('home',['products'=>$products->paginate(6),'sliderProducts'=>$products->take(3)->get()]);
    }
    public function getProduct($id){
        return view('product',['product'=>Product::find($id)]);
    }
    public function getProductsBySubcategory(Request $request,$slug){
        $products=Product::whereIn('subcategory_id',$request->subcategories)->orderByDesc('id');
        return view('home',['products'=>$products->paginate(6),'sliderProducts'=>$products->take(3)->get()]);
    }
}
