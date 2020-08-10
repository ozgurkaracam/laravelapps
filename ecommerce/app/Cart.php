<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Cart{
    public $items;
    public $totalprice;
    public $totalqty;

    public function __construct($cart=null){

        if($cart!=null){
            $this->items=$cart->items;
            $this->totalqty=$cart->totalqty;
            $this->totalprice=$cart->totalprice;
        }
        else{
            $this->items=array();
            $this->totalprice=0;
            $this->totalqty=0;
        }

    }
    public function addItem(Product $product){
        $product["qty"]=1;
        if(array_key_exists($product->id,$this->items))
            $this->items[$product->id]->qty+=1;
        else
            $this->items[$product->id]=$product;
        $this->totalprice=$this->totalprice+$product->price;
        $this->totalqty+=1;
        Session::put('cart',$this);
    }
    public function updateQty($qty,$id){
        if($qty>0)
            $this->items[$id]->qty=$qty;
    }
    public function removeItem($id){

        $product=Product::find($id);
        $this->totalprice-=$product->price*$this->items[$id]->qty;
        $this->totalqty-=$this->items[$id]->qty;
        unset($this->items[$id]);
        Session::put('cart',$this);
    }
}
