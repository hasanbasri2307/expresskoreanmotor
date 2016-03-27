<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;
use App\Product;

class HomeController extends Controller
{
    //
	private static $_data;

    public function dashboard(){
		self::$_data['title'] = "Dashboard";
		self::$_data['total_product'] = Product::count();
		self::$_data['total_user'] = User::count();
		self::$_data['new_order'] = Order::where(['status'=>0])->count();
    	return view('_partials.home',self::$_data);
    }
}
