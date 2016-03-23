<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamp = true;

    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }

}
