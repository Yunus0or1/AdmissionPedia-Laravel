<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;

use DB;
use App\Quotation;
use Input;
use App\Filename;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class LoginController extends Controller
{
    public function login()
	{
		if(Sentinel::check())
			return redirect('/community');
		
		else
		    return view('community.login')->with('message','');
		
	}
	
	
	
	public function loggedin(Request $request)
	{
		
		$email = Input::get('email') ;
		$password = Input::get('password') ;
		

		
		Sentinel::authenticate(array(
				'email' => $email,
				'password' => $password,

			));
		
		if(Sentinel::check())
			return redirect('/community');
		
		else 
			return view('community.login')->with('message','Email/Password combination is wrong');
		
	}
	
	
	public function logout(Request $request)
	{

		Sentinel::logout();

		return redirect('/');
		
	}
}
