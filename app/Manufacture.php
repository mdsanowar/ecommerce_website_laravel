<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{

    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
}
