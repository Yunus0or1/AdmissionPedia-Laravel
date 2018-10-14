<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;
use Mail;
use Activation;
use App\User;
use DB;
use App\Quotation;
use Input;
use App\Filename;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use DateTime;
use Carbon\carbon;
use json_decode;
use json_encode;


class CommunityController extends Controller
{
    public function community()
	{	
		$questions =DB::table('questions')
	   ->orderBy('id','DSC')
	   ->take(10)
	   ->get();
	   

		return view('community.homepage')->with('questions',$questions);
	}
	
	public function profile()
	{
		$user = Sentinel::getUser() ;
		return view('community.profile')->with('user',$user);
		
	}
	
	public function profileEdit()
	{
		$user = Sentinel::getUser();
		$input = Input::all();

		
		if ($input['full_name'] == null)
			$full_name = $user->full_name ;
		else
			$full_name = $input['full_name'];
		
		if ($input['user_name'] == null)
			$user_name = $user->user_name ;
		else
			$user_name = $input['user_name'];
		
		if ($input['email'] == null)	
			$email = $user->email ;
		else
			$email = $input['email'];
			
		

		if ($input['password'] != null)	
		{
			Sentinel::update($user, array(
				'email' => $email,
				'password' => $input['password'],
				'full_name' => $full_name,
				'user_name' => $user_name,
				));
		}
		
		else  {
			Sentinel::update($user, array(
				'email' => $email,
				'full_name' => $full_name,
				'user_name' => $user_name,
				));
		}
		
		if ($input['email'] != null  || $input['password'] != null)	
		{
			Sentinel::logout();
			return redirect('/login');
		}
	
		else return redirect('/profile');
	}
	
    public function askquestion()
	{
		
		return view('community.askquestion');
	}
	
	public function askingquestion()
	{
	
		$topic = Input::get('topic') ;
		$question = Input::get('question') ;
		$user_id = Sentinel::getUser()->id;
		$user_name = Sentinel::getUser()->user_name;
		$today_date = Carbon::now('Asia/Dhaka')->format('l, d F, g:i A, Y');
	
		

		
		DB::table('questions')->insert(
          [
          'topic'=>$topic,
          'question'=>$question,
          'user_id'=>$user_id,
		  'user_name'=>$user_name,
		  'asked_at' => $today_date,
          ]
        	);
			
		return redirect('/community');

	}
	
	public function detailsofquestion($question_id)
	{
		$question_details =DB::table('questions')
			->where('id','=',$question_id)
			->get();
			
		$question_reply =DB::table('reply')
			->where('question_id','=',$question_id)
			->get();	
			
		return view('community.detailsofquestion')
		->with('question_details',$question_details)
		->with('question_reply',$question_reply)
		;	
		
		
		
	}
	
	
	public function subscription()
	{
		$universitylist =DB::table('universities')
			->get();
			
		$user_id = Sentinel::getUser()->id;
		$subscription=DB::select("select * from subscribelists where userId='$user_id'");
		$result = "";
		if(isset($subscription)){
		$result = "select * from universities where univ_id not in ( select universityId from subscribelists where userId = '$user_id' )";// Yes //
	}else{
		$result = "select * from universities";
	}
		$unsubscripted = DB::select($result);
		$subscripted = DB::select("select * from universities where univ_id in ( select universityId from subscribelists where userId = '$user_id' ) ");

		//return $universitylist;
		

		return view('community.subscription',['unsubscripted'=>$unsubscripted,'subscripted'=>$subscripted,'user_id'=>$user_id]);

	}
	
    public function addSubscription($user_id,$university_id)
    {
		$user_details =DB::table('users')
			->where('id','=',$user_id)
			->get();
			
    	DB::table('subscribelists')->insert([
    		'userId'=>$user_id,
    		'universityId'=>$university_id,
    		'subscription'=>'1',
			'emailAddress'=> $user_details[0]->email,

    	]);
    	return redirect()->back();
    }

    public function deleteSubscription($user_id,$university_id){

    	DB::select("delete from subscribelists where userId='$user_id' and universityId='$university_id'");
    	return redirect()->back();

    }	

	public function sendAwarness(){
		
		$university = DB::select("select * from universities ");
		return view('community.sendAwarness',['universities'=>$university]);
	}	
	
	
	
	
	


    public function sendEmail(Request $request){
		
        $universityId = $request->universityId;
        $message_text = $request->message;
		
		$subscription_list =DB::table('subscribelists')
			->where('universityId','=',$universityId)
			->get();
			

		foreach($subscription_list as $slist)
		{

			Mail::send('addpedia.awarness',[
		
					'text' => $message_text, 
			
					], 
				function ($message) use ($message_text,$slist)
				{
					
					$message->to($slist->emailAddress);

				}
				
				);
		}

        return redirect()->back();

    }


	
	public function reply()
	{
		$question_id = Input::get('questionid') ;
		$reply = Input::get('replyquestion') ;
		$commenter_id = Sentinel::getUser()->id;
		$commenter_name = Sentinel::getUser()->user_name;
		$commented_at = Carbon::now('Asia/Dhaka')->format('l, d F, g:i A, Y');
		
		DB::table('reply')->insert(
          [
          'question_id'=>$question_id,
          'commenter_id'=>$commenter_id,
          'commenter_name'=>$commenter_name,
		  'reply'=>$reply,
		  'commented_at' => $commented_at,
          ]
        	);
			
		return redirect('/detailsofquestion/'.$question_id);
		
	}
	
	public function allyourquestions()
	{
		$user_id =  Sentinel::getUser()->id ;
		
		$allyourquestion =DB::table('questions')
			->where('user_id','=',$user_id)
			->get();
			
		return view('community.allyourquestion')->with('allyourquestion',$allyourquestion);
			

		
	}
	
	
	
	
	
	

	
	
}











































