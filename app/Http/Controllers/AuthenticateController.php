<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthenticateController extends Controller
{
    //
	private static $_data = [];

    public function login(){
    	self::$_data['title'] = "Login Express Korean Motor";
    	return view('layouts.login',self::$_data);
    }

    public function authCredentials(LoginRequest $req){
    	if($req->isMethod('post')){
    		$email = $req->input('email');
    		$password = $req->input('password');
    		if(Auth::attempt(['email'=>$email,'password'=>$password,'status'=>1])){
    			return redirect()->route('home');
    		}else{
    			Session::flash('error','Username / Password is Wrong');
    			return back()->withInput();
    		}
    	}
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/login');
    }
}
