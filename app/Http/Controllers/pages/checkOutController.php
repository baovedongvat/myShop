<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Product;
use Session;
use Mail;
use Illuminate\Support\Facades\DB;
use App\huonghuong;

class checkOutController extends Controller
{
    function getCheckout(){
    	$oldcart = Session::has('cart')?Session::get('cart'):null;
    	return view('pages/checkout',compact(['cart','oldcart']));
    }

    function postcheckOut(Request $req){
       
        try {
         DB::beginTransaction();    
        
    	$human = new Customer;
    	$human->name = $req->name;
    	$human->email = $req->email;
    	$human->phone = $req->tel;
    	$human->address = $req->address;
        $human->save();

    	$oldcart = Session::has('cart')?Session::get('cart'):null;
    	$bill= new Bill;
    	$bill->id_customer = $human->id;
    	$bill->date_ordered= date('Y-m-d');
    	$bill->total = $oldcart->totalPrice;
    	$bill->token= huonghuong::createToken();
    	$bill->token_date =  strtotime(date('Y-m-d H:i:s'));
    	$bill->save();

    	$bill_id=$bill->id;
    	foreach ($oldcart->items as $key => $item) {
    		$bd = new BillDetail;
    		$bd->bill_id = $bill_id;
    		$bd->product_id=$key;
    		$bd->quantity = $item['qty'];
    		$bd->price = $item['price'];
            $p = Product::where('id',$key)->first();
            $p->sl_hienco -=$item['qty'];
            $p->save();
    		$bd->save();
    	}
         $success = true;
         DB::commit();
        } catch (\Illuminate\Database\QueryException $ex) {
             $success = false;
                DB::rollback();
                
        }
         catch (Exception $e) {
             return redirect()->back()->with('message','đã xảy ra lỗi khi gửi mail vui lòng thử lại'); 
        }
        if ($success){
            $data = compact('oldcart','human','bill');
             Mail::send('mail',$data,function($mess) use ($data){
                    $mess->from('nanopro1410@gmail.com','Người bán hàng thân thiện');
                    $mess->to($data['human']->email)->subject('Thư xác nhận mua hàng');
            });
            session::forget('cart');
            return redirect()->route('cart')->with('message','Đã order xong, xin vào email để confirm order và chờ hàng ship về nhà'); 

        }
        else{
             return redirect()->back()->with('message','Đã xảy ra lỗi vui lòng thử lại'); 
        }
        
        
       
    	
    }

    function getConfirm($token,$tokendate){
        $token = $token;//KBImYM9isFuiAwhlcUqzmpCrAR7KXf
        $time = $tokendate;
        $now = strtotime(date('Y/m/d H:i:s'));
        if($now - $time <= 86400){
            //
            if(strlen($token)==30){
                $bill =  Bill::where('token',$token)->first();
                dd($bill);
               
            }
        
    }
}
}