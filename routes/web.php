<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'pages\homeController@getHomePage');
Route::get('/home', 'pages\homeController@getHomePage');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/detail/{url}', 'pages\detailController@getProductDetail');
Route::get('/cat-detail/{url}', 'pages\detailController@getCatDetail');

Route::get('/cart', ['uses' => 'pages\cartController@getCart', 'as'=>'cart']);


Route::get('/check-out', ['uses' => 'pages\checkOutController@getCheckout', 'as'=>'check-Out']);


Route::get('/confirm/{token}/{tokendate}', ['uses' => 'pages\checkOutController@getConfirm', 'as'=>'confirmed']);

Route::post('intoCart',['uses' => 'pages\cartController@AddCart','as' => 'addCart']);
Route::post('sendcheckout',['uses' => 'pages\checkOutController@postCheckOut','as' => 'checkOut']);

Route::post('delItem',['uses' => 'pages\cartController@delItem','as' => 'delFromCart']);	
Route::post('updateItem-inCart',['uses' => 'pages\cartController@updateCart','as' => 'updateCart']);	

Route::group(['prefix'=>'admin'],function(){

Route::get('products',['uses' => 'admin\productController@getProductPage','as' => 'product-page']);	
Route::get('add-product',['uses' => 'admin\productController@getAddProduct','as' => 'add-product']);
Route::post('post-add-product',['uses' => 'admin\productController@postAddProduct','as' => 'post-add-product']);		
Route::get('edit-product/{productID}',['uses' => 'admin\productController@getEditProduct','as' => 'edit-product']);
Route::post('done-edit',['uses' => 'admin\productController@postEditProduct','as' => 'done-edit']);
Route::post('delete_your_product',['uses' => 'admin\productController@postDelProduct','as' => 'del-product']);
Route::get('types',['uses' => 'admin\typeController@getTypePage','as' => 'type-page']);	
Route::get('edit-type/{typeID}',['uses' => 'admin\typeController@getEditType','as' => 'edit-type']);	
Route::post('post-edit-type',['uses' => 'admin\typeController@postEditType','as' => 'post-edit-type']);
Route::post('del-type',['uses' => 'admin\typeController@deleteType','as' => 'del-type']);
Route::get('add-type',['uses' => 'admin\typeController@getAddType','as' => 'add-type']);
Route::post('done-add-type',['uses' => 'admin\typeController@postAddType','as' => 'done-add-type']);


});