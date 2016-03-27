<?php

namespace App\Http\Controllers;

use Expresskoreanmotor\Libraries\Customlib;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Product;
use File;

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

    public function update(ProductRequest $req,$id){
		$product = Product::find($id);
		$product->p_name = $req->input('p_name');
		$product->price = $req->input('price');
		$product->description = $req->input('description');
		$product->is_available = $req->input('is_available');
		$product->is_show = $req->input('is_show');
		$product->discount = $req->input('discount');
		$product->cat_id = $req->input('cat_id');
		$product->tags = $req->input('tags');

		if($req->input('change_1')==1){

			unlink(public_path().'/uploaded/'.$req->input('pic1'));

		}

		if($req->input('change_2')==1){
			unlink(public_path().'/uploaded/'.$req->input('pic2'));
		}

		if($req->input('change_3')==1){
			unlink(public_path().'/uploaded/'.$req->input('pic3'));
		}

		if ($req->hasFile('picture_1')) {
			//

			$filename = $req->file('picture_1')->getClientOriginalName();
			$extension = $req->file('picture_1')->getClientOriginalExtension();
			$filename = md5($filename.time());
			$destinationPath = public_path().'/uploaded/';
			$req->file('picture_1')->move($destinationPath, $filename.'.'.$extension);

			$product->pict_1= $filename.'.'.$extension;
		}

		if ($req->hasFile('picture_2')) {
			//

			$filename = $req->file('picture_2')->getClientOriginalName();
			$extension = $req->file('picture_2s')->getClientOriginalExtension();
			$filename = md5($filename.time());
			$destinationPath = public_path().'/uploaded/';
			$req->file('picture_2')->move($destinationPath, $filename.'.'.$extension);

			$product->pict_2= $filename.'.'.$extension;
		}

		if ($req->hasFile('picture_3')) {
			//

			$filename = $req->file('picture_3')->getClientOriginalName();
			$extension = $req->file('picture_3')->getClientOriginalExtension();
			$filename = md5($filename.time());
			$destinationPath = public_path().'/uploaded/';
			$req->file('picture_3')->move($destinationPath, $filename.'.'.$extension);

			$product->pict_3= $filename.'.'.$extension;
		}


		$product->save();

		Session::flash("success","Product has been updated");
		return redirect()->route('product.list');
    }

    public function delete($id){
    	$product = Product::find($id);

		unlink(public_path('uploaded/'.$product->pict_1));
		unlink(public_path('uploaded/'.$product->pict_2));
		unlink(public_path('uploaded/'.$product->pict_3));

		$product->delete();

		Session::flash("success",'Product has been deleted');
    }

	public function show($id){
		$product = Product::find($id);
		self::$_data['product'] = $product;
		self::$_data['title'] = "Product Detail";

		return view("master.product.product_show",self::$_data);
	}
}
