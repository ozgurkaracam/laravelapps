<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $cart=new Cart(Session::get('cart'));
        $cart->addItem(Product::find($request->productid));
        Session::put('cart',$cart);
        notify()->success('Item added to cart!!!');
        return redirect()->back();
    }
    public function index(){
        if(Session::has('cart'))
            $cart=Session::get('cart');
        else
            $cart=new Cart();
        return view('cart',compact('cart'));
    }
    public function deleteToCart(Request $request){
        $cart=new Cart(Session::get('cart'));
        $cart->removeItem($request->productid);
        notify()->success('Delete item in cart!!!');
        return redirect()->back();
    }

    public function order($total){
            $cart=new Cart(Session::get('cart'));
            return view('order',compact('total','cart'));
    }
    public function payment(Request $request){
//        $charge=Stripe::charges()->create([
//            'currency'=>'USD',
//            'amount'=>$request->totalprice,
//            'source'=>$request->stripeToken
//        ]);
//        return $charge;
        Auth::user()->orders()->create([
            'cart'=>serialize(new Cart(Session::get('cart')))
        ]);
        Session::forget('cart');
        notify()->success('ORDER OK');
        return redirect()->route('home');
    }

    public function orders(){
        $orders=Auth::user()->orders;
        return view('orders',compact('orders'));
    }
}
