<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    //
	private static $_data;

    public function index(){
		self::$_data['title'] = "User List";
    	self::$_data['user'] = User::all();
    	return view('master.user.user_list',self::$_data);
    }

    public function add(){
		self::$_data['title'] = "User Add";
        return view("master.user.user_add",self::$_data);
    }

    public function store(UserRequest $req){
		$user = new User();
		$user->u_name = $req->input('u_name');
		$user->email = $req->input('email');
		$user->password = bcrypt($req->input('password'));
		$user->status= $req->input('status');
		$user->save();

		Session::flash('success','User has been created');
		return redirect()->route('user.list');

    }

    public function edit($id){
		$user = User::find($id);
		self::$_data['title']= "Edit User";
		self::$_data['user'] = $user;
		return view("master.user.user_edit",self::$_data);
    }

    public function update(UserRequest $req,$id){
		$user = User::find($id);
		$user->u_name = $req->input('u_name');
		$user->status = $req->input('status');
		$user->save();

		Session::flash('success','User has been updated');
		return redirect()->route('user.list');
    }

    public function delete($id){
		$user = User::find($id);
		$user->delete();

		Session::flash('success','User has been deleted');
    }
}
