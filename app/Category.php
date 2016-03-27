<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamp = true;

	protected $fillable = ['cat_name','is_show'];

    public function product(){
    	return $this->hasMany('App\Product','cat_id');
    }

}
