<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use Session;

class OrdersController extends Controller
{
    //
	private static $_data;

    public function index(){
		self::$_data['title'] = "Order List";
		self::$_data['order'] = Order::all();

		return view("orders.order_list",self::$_data);
    }

    public function add(){

    }

    public function store(){

    }

    public function edit($id){

    }

    public function update(Request $req){
		if($req->ajax()){
			$id = $req->input('id');
			$order = Order::find($id);
			$order->status=1;

			$order->save();

			Session::flash('success','Order has been processed');

		}
    }

    public function delete($id){
    	
    }

	public function show($id){
		self::$_data['order'] = Order::find($id);
		self::$_data['title'] = "Order Detail";

		return view('orders.order_show',self::$_data);
	}
}
