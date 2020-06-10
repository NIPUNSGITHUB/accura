<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{    
    protected $hidden = ['created_at','updated_at'];

     public function Members()
     {
        return $this->hasMany('App\Member');
     }
}
