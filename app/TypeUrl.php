<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUrl extends Model
{
      protected $table = 'type_url';
public $timestamps = false;
          function Type(){
 
        //ko dùng foreach()
        
        return $this->belongsTo('App\Type','id','id_url'); 
    //     //id_type: fk
    //     //id : type // other key
    }
      
}
