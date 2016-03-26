<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamp = true;

	protected $fillable = ['p_name','price','description','is_available','is_show','discount','cat_id','tags','pict_1','pict_2','pict_3'];

    public function category(){
    	return $this->belongsTo('App\Category','cat_id');
    }

    public function order(){
    	return $this->hasMany('App\Order','product_id');
    }
}
