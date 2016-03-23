<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    //
	private static $_data;

    public function index(){
    	self::$_data['user'] = User::all();
    	return view('master.user.user_list',self::$_data);
    }

    public function add(){

    }

    public function store(){

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function delete($id){

    }
}
