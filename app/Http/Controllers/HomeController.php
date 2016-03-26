<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
	private static $_data;

    public function dashboard(){
		self::$_data['title'] = "Dashboard";
    	return view('_partials.home',self::$_data);
    }
}
