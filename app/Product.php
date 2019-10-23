<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Category')->withTimestamps();
    }
    public function manufactures()
    {
    	return $this->belongsToMany('App\Manufacture')->withTimestamps();
    }
}
