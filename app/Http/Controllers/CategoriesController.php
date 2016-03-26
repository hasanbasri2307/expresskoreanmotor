<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    //

	private static $_data;

    public function index(){
		$category = Category::all();
		self::$_data['category'] = $category;
		self::$_data['title'] = "Category List";
    	return view('master.category.category_list',self::$_data);
    }

    public function add(){
		self::$_data['title'] = "Category Add";
		return view("master.category.category_add",self::$_data);
    }

    public function store(CategoryRequest $req){
		$category = new Category();
		$category->cat_name = $req->input('cat_name');
		$category->is_show = $req->input('is_show');
		$category->save();

		Session::flash("success","Category has been created");
		return redirect()->route('category.list');
    }

    public function edit($id){
		$category = Category::find($id);
		self::$_data['category'] = $category;
		self::$_data['title'] = "Category Edit";

		return view("master.category.category_edit",self::$_data);
    }

    public function update(CategoryRequest $req,$id){
		$category = Category::find($id);
		$category->cat_name = $req->input('cat_name');
		$category->is_show = $req->input('is_show');
		$category->save();

		Session::flash("success","Category has been updated");
		return redirect()->route('category.list');
    }

    public function delete($id){
    	$category = Category::find($id);
		$category->delete();

		Session::flash("success","Category has been deleted");
    }
}
