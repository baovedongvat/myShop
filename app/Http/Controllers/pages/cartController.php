<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cart;
use App\Product;
use Session;
class cartController extends Controller
{
    function getCart(){
    	$oldcart = Session::has('cart')?Session::get('cart'):null;
    
      // dd($oldcart);
    	return view('pages/cart',compact(['cart','oldcart']));
    }

    function AddCart(Request $req){
    	
    	$product_id = $req->idFood;
    	$qty = $req->qty;


    	$food = Product::where('id',$product_id)->first();
    	$oldcart = Session::has('cart') ?  Session::get('cart'):null;

    	$cart = new Cart($oldcart);
        if ($qty>=0)
    	$cart->add($food,$qty);
        else $cart->reduceByOne($product_id);
    	Session::put('cart',$cart);

        $giaSp = number_format($cart->items[$product_id]['price']);
        $tongDongia = number_format($cart->totalPrice);
        $soluong = $cart->items[$product_id]['qty'];
        $product_name = $food->name;
        $arr = ['giaSp'=>$giaSp,'tongDongia'=>$tongDongia,'soluongsp'=>$soluong,'name'=>$product_name];
        echo json_encode($arr);
 
        // return json_encode($cart);
    	
    }
      function delItem(Request $req){
        
        $product_id = $req->idFood;
        $oldcart = Session::has('cart') ?  Session::get('cart'):null;

        $cart = new Cart($oldcart);
        $cart->removeItem($product_id);
        Session::put('cart',$cart);
        $tongDongia = number_format($cart->totalPrice);
        $arr = ['tongDongia'=>$tongDongia];
        echo json_encode($arr);
        
    }

    public function updateCart(Request $req){
         //nhan tu ajax view chi tiet
        $product_id = $req->idFood;
        $qty = $req->qty;
 
         //lay thong tin sp chuan bi them vao gio hang
        
        $food = Product::where('id',$product_id)->first();
        $oldCart = Session::has('cart') ?  Session::get('cart'):null;
         //them vao gio hang
         //lay thong tin gio hang truoc do
         $cart = new Cart($oldCart);
         $cart->update($food, $qty);
 
         //luu gio hang vao session
         Session::put('cart',$cart);
         
        $giaSp = number_format($cart->items[$product_id]['price']);
        $tongDongia = number_format($cart->totalPrice);
        $arr = ['giaSp'=>$giaSp,'tongDongia'=>$tongDongia];
        echo json_encode($arr);
 
    }
 
}
