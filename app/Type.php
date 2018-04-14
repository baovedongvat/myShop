<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
   protected $table = 'types';
  public $timestamps = false;
      function Product(){

        //ko dùng foreach()
        
        return $this->hasMany('App\Product','id_type','id');
        //id_type: fk
        //id : type // other key
    }
     function TypeUrl(){

        //ko dùng foreach()
        
        return $this->hasOne('App\TypeUrl','id','id_url');
        //id_type: fk
        //id : type // other key
    }
}
