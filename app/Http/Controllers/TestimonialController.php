<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Testimonial;
use Session;

class TestimonialController extends Controller
{
    //
    private static $_data;

	public function index(){
		self::$_data['title'] = "Testimonial List";
		self::$_data['order'] = Testimonial::orderBy('created_at','desc')->get();

		return view("testimonials.testimonial",self::$_data);
	}

	public function update($id,$status){
		$testimonial = Testimonial::find($id);
		$testimonial->status = $status;
		$testimonial->save();

		Session::flash('success','Testimonial has been updated');
		return redirect()->route('testimonial.list');
	}
}
