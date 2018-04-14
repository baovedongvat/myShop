<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\huonghuong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use App\TypeUrl;

class typeController extends Controller
{
     function getTypePage(){
      
    	$types = Type::orderBy('id','asc')->get();

    	// $files = File::allFiles('template/images/products');
    	// File::move('template/images/products/112.jpg','template/images/112.jpg');
    	return view('admin\pages\type',compact(['types']));
    }
     function getEditType($typeID){
     	$type = Type::where('id',$typeID)->first();
    	
    	return view('admin\pages\edit-type',compact(['type']));
    }
    function postEditType(Request $req){
    	try {
    		$helper = new huonghuong;
    		 DB::beginTransaction();   
    		$type = Type::where('id',$req->type_id)->first();
    		$type->type_name = $req->name; 
    		$type->save();
    		$typeurl = TypeUrl::where('id',$type->id_url)->first();
    		$typeurl->url = $helper->changeTitle($req->name);
    		$typeurl->save();
    		 DB::commit();
    		 return json_encode($type);
    		
    	} catch (Exception $e) {
    		DB::rollback();
    		echo (json_encode($e));

    	}
    }
    function deleteType(Request $req){
    	try {
    		 DB::beginTransaction();   
    		 
    	} catch (Exception $e) {
    		
    	}
    }
    function getAddType(){
    	return view('admin\pages\add-type');
    }


function postAddType(Request $req){
    	try {
    		DB::beginTransaction();
    		$helper = new huonghuong;
    		$url = new TypeUrl;
    		$url->url = $helper->changeTitle($req->type_name);
    		$url->save();
    		 
    		$type = new Type;
    		$type->type_name = $req->type_name;
    		$type->id_url = $url->id;
    		$type->save();
    		DB::commit();
    		return redirect()->route('type-page')->with('message','đã thêm loại mới');
    		

    	} catch (Exception $e) {
    		DB::rollback();
    		dd($e);
    	}
    }
}