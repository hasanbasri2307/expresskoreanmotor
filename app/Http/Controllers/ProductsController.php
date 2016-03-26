<?php

namespace App\Http\Controllers;

use Expresskoreanmotor\Libraries\Customlib;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Product;

use Session;

class ProductsController extends Controller
{
    //
	private static $_data;

    public function index(){
		$product = Product::all();
		self::$_data['product'] = $product;
		self::$_data['title'] = "Product List";

		return view("master.product.product_list",self::$_data);
    }

    public function add(){
		$category = Customlib::gen_category();
		self::$_data['category'] = $category;
		self::$_data['title'] = "Product Add";

		return view("master.product.product_add",self::$_data);
    }

    public function store(ProductRequest $req){
		$product = new Product();
		$product->p_name = $req->input('p_name');
		$product->price = $req->input('price');
		$product->description = $req->input('description');
		$product->is_available = $req->input('is_available');
		$product->is_show = $req->input('is_show');
		$product->discount = $req->input('discount');
		$product->cat_id = $req->input('cat_id');
		$product->tags = $req->input('tags');

		$files = $req->file('picture');
		$no = 1;
		foreach($files as $file){
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$filename = md5($filename.time());
			$destinationPath = public_path().'/uploaded/';
			$file->move($destinationPath, $filename.'.'.$extension);

			$field = "pict_".$no;
			$product->{$field}= $filename.'.'.$extension;
			$no++;
		}

		$product->save();

		Session::flash("success","Product has been created");
		return redirect()->route('product.list');
    }

    public function edit($id){
		$category = Customlib::gen_category();
		$product = Product::find($id);
		self::$_data['product'] = $product;
		self::$_data['category'] = $category;
		self::$_data['title'] = "Product Edit";

		return view("master.product.product_edit",self::$_data);
    }

    public function update($id){

    }

    public function delete($id){
    	
    }
}
