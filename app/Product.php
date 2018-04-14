<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
     use SoftDeletes;
    protected $table = 'products';
     protected $dates = ['deleted_at'];

     public $timestamps = false;
      function Image(){

        //ko dùng foreach()
        
        return $this->hasMany('App\Image','product_id','id'); //id là id của product
        //id_type: fk
        //id : type // other key
    }
    function ProductUrl(){
    return $this->hasOne('App\ProductUrl','id','id_url');
}
	function Type(){
		return $this->belongsTo('App\Type','id_type','id');
	}
}
