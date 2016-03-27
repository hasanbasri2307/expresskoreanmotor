<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contactus;

class Contact extends Controller
{
    //
	private static $_data;

	public function index(){
		self::$_data['title'] = "Contact List";
		self::$_data['order'] = Contactus::orderBy('created_at','desc')->get();

		return view("contacts.contact_list",self::$_data);
	}
}
