<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductUrl extends Model
{
     protected $table = 'product_url';
  public $timestamps = false;

    function Product(){

        //ko dùng foreach()
        
        return $this->belongsTo('App\Product','id','id_url'); 
    //     //id_type: fk
    //     //id : type // other key
    }
}
