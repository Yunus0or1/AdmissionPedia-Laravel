<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;

use DB;
use Mail;
use Activation;
use App\Quotation;
use Input;
use App\Filename;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class RegistrationController extends Controller
{
    public function register()
	{
		if(Sentinel::check())
			return redirect('/community');
		
		else 
			return view('community.register');
	
	}
	
	
	public function registrationcomplete(Request $request)
	{
		
		
		if($request->hasFile('filea'))
			
        {   
			
			$filepath = $request->filea->getClientOriginalName();
			
			$request->filea->storeAs('public/upload',$filepath);
		
        }
		

		
		$full_name = Input::get('full_name') ;
		$user_name = Input::get('user_name') ;
		$email = Input::get('email') ;	
		$password =Input::get('password') ;
		$type = 'normaluser';
		$imagepath = $filepath;
		
		

		$user = Sentinel::register(array(
				'full_name' => $full_name,
				'user_name' => $user_name,
				'email'    => $email,
				'password' => $password,
				'type' => $type,
				'imagepath' => $imagepath,
			));
			
		$activation = Activation::create($user);
		
		$this->sendEmail($user,$activation->code);
			

		return redirect('/login');
		
	}
	
	
	
	
	public function addmember(){

		return view('community.addMember');
	
	}
	
	
	public function registerNewMember(Request $request){
		


		if($request->hasFile('filea'))			
        {   		
			$filepath = $request->filea->getClientOriginalName();
			
			$request->filea->storeAs('public/upload',$filepath);
        }
		

		
		$full_name = Input::get('full_name') ;
		$user_name = Input::get('user_name') ;
		$email = Input::get('email') ;	
		$password =Input::get('password') ;
		$type = Input::get('type');
		$imagepath = $filepath;
		
		

		$user = Sentinel::registerAndActivate(array(
				'full_name' => $full_name,
				'user_name' => $user_name,
				'email'    => $email,
				'password' => $password,
				'type' => $type,
				'imagepath' => $imagepath,
			));
			
		
	
	}
	
	private function sendEmail($user,$code)
	
	{
		Mail::send('addpedia.activation',[
		
			'user' => $user , 
			'code' => $code
		
		], function ($message) use ($user){
			
			$message->to($user->email);
			$message->subject("Hello $user->full_name, Activate your account.");
		}
		
		);
		
		
	}
	
	
	public function activate($user_email,$code)
	{	
		$user =DB::table('users')
				->where('email','=',$user_email)
                ->get(); 
				 
		$user = Sentinel::findById($user[0]->id);
		Activation::complete($user, $code);
		
		return redirect('/login');
	}
	
	
}


















