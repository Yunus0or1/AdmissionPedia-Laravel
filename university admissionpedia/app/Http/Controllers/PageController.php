<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Filename;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use app\controllers\ScienceController;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
	
   
   
   public function homepage()
	{
			
		 $news = DB::table('news')
			   ->get();
		

		return view('firstpage')
		->with('news',$news);
		
				// $a = Hash::make('asd');

				// return $a ;
	
	}
	
   public function aboutus()
    {

    	return view('aboutus') ;

    }
			 
	public function formfirstpage()
	{
		return view('formfirstpage');
	}
			
	public function admin()
	{
		return view('students.admin.loginadmin');
	}
			
	public function create()
	{
		return view('students.create_student');
	}
			
			

		
	public function initial()
	{
					
		$data = Input::all();
		
		$student_ssc_year = Input::get('ssc_year');
		$student_ssc_year = $student_ssc_year - 2;
		$student_hsc_year = Input::get('hsc_year');
		$student_group = Input::get('group');
		

		
		
		if($student_group == 'Science')
			return Redirect::route('datapassScience',['hsc_year'=>$student_hsc_year,'ssc_year'=>$student_ssc_year]);
		if($student_group == 'Commerce')
			return Redirect::route('datapassCommerce',['hsc_year'=>$student_hsc_year,'ssc_year'=>$student_ssc_year]);
		if($student_group == 'Humanities')
			return Redirect::route('datapassHumanities',['hsc_year'=>$student_hsc_year,'ssc_year'=>$student_ssc_year]);
				
	}
			
		 
	public function science($hsc_year,$ssc_year)
	{
		return view('students.entryScience')
		->with('hsc_year',$hsc_year)->with('ssc_year',$ssc_year);
	}

	public function commerce($hsc_year,$ssc_year)
	{
		return view('students.entryCommerce')
		->with('hsc_year',$hsc_year)->with('ssc_year',$ssc_year);
	}

	public function humanities($hsc_year,$ssc_year)
	{
		return view('students.entryHumanities')
		->with('hsc_year',$hsc_year)->with('ssc_year',$ssc_year);
	}



			
			
	public function checkUnit($univ_id,$student_id,$group)
	
	{			
		if($group == 'S')//Means Server will look in science group and take GPA from science_student table
		{
				return Redirect::route('science_unit_finding',['univ_id'=>$univ_id,'student_id'=>$student_id,'group'=>$group]);

		}
		
		if($group == 'C')//Means Server will look in Commerce group and take GPA from commerce_student table
		{
				return Redirect::route('commerce_unit_finding',['univ_id'=>$univ_id,'student_id'=>$student_id,'group'=>$group]);

		}
		if($group == 'A')//Means Server will look in Humanities group and take GPA from humanities_student table
		{
				return Redirect::route('humanities_unit_finding',['univ_id'=>$univ_id,'student_id'=>$student_id,'group'=>$group]);

		}
	}
			
			
			
	public function checkDept($univ_id,$student_id,$group)
	
	{			
		if($group == 'S')
		{
				return Redirect::route('science_dept_finding',['univ_id'=>$univ_id,'student_id'=>$student_id,'group'=>$group]);

		}
		
		if($group == 'C')
		{
				return Redirect::route('commerce_dept_finding',['univ_id'=>$univ_id,'student_id'=>$student_id,'group'=>$group]);

		}
		if($group == 'A')
		{
				return Redirect::route('humanities_dept_finding',['univ_id'=>$univ_id,'student_id'=>$student_id,'group'=>$group]);

		}
	}

	public function rejected($univ_id,$student_id)
	{
		
		$result = DB::table('science_student')
				->where('student_id','=',$student_id)
				->get();
			 
		$requirement = 	DB::table('universities')
						->where('univ_id','=',$univ_id)
						->get();
 
 
		return view('students.rejectedunivShow')->with('result',$result)->with('requirement',$requirement);
	}			
			
	public function breakingNews()
	{
		
		return view('community.breakingnews');
		
	}
			
			
	public function breakingNewsSent()
	{
		$news = Input::get('breaking_news');
		
		DB::table('news')->delete();
		
		DB::table('news')
			->insert(['headline' => $news]);
			
		return redirect('/');
					
	}
			
	public function removenews()
	{
		
		DB::table('news')->delete();
		return redirect('/');
		
	}
	
	public function download(){
	

		$filepath = Input::get('path');
		$path = storage_path('app/public/upload/'.$filepath);
		//return $path;
		return response()->download($path);
			
	}
	
	
	
	
}























