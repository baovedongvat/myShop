<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Type;
use File;
use App\huonghuong;
use App\ProductUrl;
use App\Image;
class productController extends Controller
{
    function getProductPage(){
      $path = "template\images\products";
    	$products = Product::orderBy('id','asc')->get();

    	// $files = File::allFiles('template/images/products');
    	// File::move('template/images/products/112.jpg','template/images/112.jpg');
    	return view('admin\pages\product',compact(['products']));
    }
      function getAddProduct(){
    	$types = Type::orderBy('id','asc')->get();
    	// $files = File::allFiles('template/images/products');
    	// File::move('template/images/products/112.jpg','template/images/112.jpg');
    	return view('admin\pages\add-product',compact(['types']));
    }
    function postAddProduct(Request $request){
    	
    try {
    	 DB::beginTransaction();   
    	$helper = new huonghuong;
    	$alias = $helper->changeTitle($request->name);
    	$newUrl = new ProductUrl;
    	$newUrl->url = $alias;
    	$newUrl->save();
    	$id_type = Type::where('type_name',$request->type)->first();
    	//hình ảnh
    	
    	$item = new Product;
    	if ($request->hasfile('image')){

    		$files = $request->file('image');
    		$dem=0;
    		foreach ($files as $key => $img) {
    			$img_name = $alias.'-'.$dem.'.'.$img->getClientOriginalExtension();
    			
    		
    			if ($dem==0){
    			
    				$item->name = $request->name;
			        $item->id_type = $id_type->id;
			        $item->id_url = $newUrl->id;
			        $item->price =  $request->price;
			        $item->sl_hienco =  $request->qty;
			        $item->detail = $request->description;
			        $item->img = $img_name;
			        date_default_timezone_set('Asia/Ho_Chi_Minh');
			        $item->date_added =  date('Y/m/d h:i:s', time());
			        $item->save();
    			}
    			$new_img = new Image;
    			$new_img->product_id = $item->id;
    			$new_img->image = $img_name;
    			$new_img->selected =1;
    			$new_img->save();
    			++$dem;
    			$img->move('template/images/products',$img_name);
    		}
    }
    //
       
     

         DB::commit();
         return redirect()->route('product-page');
    } catch (Exception $ex) {
    	DB::rollback();
    	dd($ex);
        DB::rollback();
    }
}

    function getEditProduct($productID){
        $types = Type::orderBy('id','asc')->get();
        $product = Product::where('id',$productID)->first();
        return view('admin\pages\edit-product',compact(['types','product']));

    }
    function postEditProduct(Request $req){
        try {
          $helper = new huonghuong;
             DB::beginTransaction();  
             $product = Product::where('id',$req->product_id)->first();
             $product->name = $req->name;
             $product->sl_hienco = $req->qty;
             $product->price = $req->price;
             $product->img = $req->main_img;
             $product->save();
             $producturl = ProductUrl::where('id',$product->id_url)->first();
              $producturl->url = $helper->changeTitle($req->name);
              $producturl->save();
             DB::commit(); 

        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollback();
            echo (json_encode($ex));
        }
        echo json_encode($product);
    }
    function postDelProduct(Request $req){
        try {
            $path = "template\images\products";
             DB::beginTransaction();  
             $product = Product::where('id',$req->product_id)->first();
              foreach ($product->Image as $key => $img) {
                   File::Delete($path.'\\'.$img->image);
                   $img->delete();
              }
              $id_url =  $product->id_url;
              $product->id_url=NULL;
              $product->save();
              $producturl = ProductUrl::where('id', $id_url )->first();
              $producturl->delete();
              $product->delete();
              echo (json_encode($product));
             DB::commit(); 

        } catch (Exception $ex) {
            DB::rollback();
            echo(json_encode($ex));
          
        }
        
    }
}
