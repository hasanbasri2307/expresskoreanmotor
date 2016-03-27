<?php
namespace Expresskoreanmotor\Libraries;
use App\Category;

class Customlib {

	public static function gen_status_user($status){
		$view = "";
		switch ($status) {
			case '1':
				$params = [];
				$params['css_class'] = "success";
				$params['message'] = "Active";
				$view = view('_partials.status')->with('params',$params)->render();
				
				break;

			case '2':
				$params = [];
				$params['css_class'] = "danger";
				$params['message'] = "Inactive";
				$view = view('_partials.status')->with('params',$params)->render();

				break;
			
			default:
				# code...
				break;
		}

		return $view;

	}

	public static function gen_product_available($status){
		$view = "";
		switch ($status) {
			case '1':
				$params = [];
				$params['css_class'] = "success";
				$params['message'] = "Available";
				$view = view('_partials.status')->with('params',$params)->render();

				break;

			case '0':
				$params = [];
				$params['css_class'] = "warning";
				$params['message'] = "Out Of Stock";
				$view = view('_partials.status')->with('params',$params)->render();

				break;

			default:
				# code...
				break;
		}

		return $view;

	}

	public static function gen_category(){
		$category = Category::all();
		$result = [];
		foreach($category as $item){
			$result[$item->id] = $item->cat_name;
		}

		return $result;
	}

	public static function gen_status_order($status)
	{
		$view = "";
		switch ($status) {
			case '0':
				$params = [];
				$params['css_class'] = "warning";
				$params['message'] = "Need Process";
				$view = view('_partials.status')->with('params', $params)->render();

				break;

			case '1':
				$params = [];
				$params['css_class'] = "success";
				$params['message'] = "Done";
				$view = view('_partials.status')->with('params', $params)->render();

				break;

			default:
				# code...
				break;
		}

		return $view;
	}

}