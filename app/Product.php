<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamp = true;

    public function category(){
    	return $this->belongsTo('App\Category','cat_id');
    }

    public function order(){
    	return $this->hasMany('App\Order','product_id');
    }
}
