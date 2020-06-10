<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
