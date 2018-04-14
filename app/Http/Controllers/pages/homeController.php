<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image;
use App\Product;
use App\Type;
use App\ProductUrl;
class homeController extends Controller
{
       function getHomePage(){
       	if (Product::where('featured',1)->count()<9){
       	$featured_products = Product::orderBy('date_added','asc')->where('featured','=','1')->get();
       	$products = Product::all()->random(1);
       }
       	else{
       	 $featured_products = Product::orderBy('date_added','asc')->where('featured','=','1')->paginate(9);
       	 $products = Product::all()->random(9);
       	}
       
       	
       	// $test = ::find(1);
       	// dd($products->id_type);
       	 // View::share('page', $page);
        return view('pages/home',compact(['featured_products','categories','products']));

    }
}
 