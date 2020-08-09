<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $cart=new Cart(Session::get('cart'));
        $cart->addItem(Product::find($request->productid));
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function index(){
        return view('cart');
    }
}
