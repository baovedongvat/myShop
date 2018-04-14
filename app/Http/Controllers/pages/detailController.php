<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductUrl;
use App\TypeUrl;

use App\Image;
class detailController extends Controller
{
    function getProductDetail($url){
    	$product = ProductUrl::where('url',$url)->first();
    	$imageSet= Image::where('product_id',$product->Product->id)->get();
    	
    	
    	
    	return view('pages/productDetail',compact(['product','imageSet']));
    }
    function getCatDetail($url){
    	$cats =TypeUrl::where('url',$url)->first();
    	$products = Product::where('id_type',$cats->id)->get();
        $products = Product::where('id_type',$cats->id)->paginate(9);
    	return view('pages/cat-detail',compact(['cats','products']));
    }
}
