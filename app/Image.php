<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     protected $table = 'images';
    public $timestamps = false;

  

    //1-n
    function Product(){

        //ko dùng foreach()
        
        return $this->belongsTo('App\Product','product_id','id'); //id là id của product
    //     //id_type: fk
    //     //id : type // other key
    }
    	
}
