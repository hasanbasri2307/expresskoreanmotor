<?php
namespace Expresskoreanmotor\Libraries;

class Customlib {

	public static function gen_status_user($status){
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
	}
}