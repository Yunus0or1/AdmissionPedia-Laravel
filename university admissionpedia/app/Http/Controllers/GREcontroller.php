<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;
use App\Notifications\SendEmail;
use Illuminate\Support\Facades\Hash;
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

class GREcontroller extends Controller
{
	public function gre_score()
	{
		return view('foreigner.gre_input');
	}
	
	
	public function gre_university()
	
	{
		
		$gre_score = Input::get('gre_score');
		
		$eligible_university = 
				DB::table('universities')
				->where('gre_score','<=', $gre_score)
				->where('universities.apply_off','>=',date('Y-m-d'))
				->get();

	
		$uneligible_university = 
				DB::table('universities')
				->where('gre_score','>', $gre_score)
				->get();

		$apply_out_of_date_university = 
				DB::table('universities')
				->where('gre_score','=', $gre_score)
				->where('universities.apply_off','<',date('Y-m-d'))
				->get();
				
		return view('foreigner.univShow')
		  ->with('eligible_university', $eligible_university)
			->with('uneligible_university', $uneligible_university)
			  ->with('apply_out_of_date_university', $apply_out_of_date_university);
 
	}
	
	
	public function gre_unit($univ_id)
	{
			$gre_unit_details = DB::table('all_nctb_curriculum_units')
				
				->where('univ_id','=',$univ_id)
				->get();
				
			$university_details = DB::table('universities')
			
					   ->where('univ_id','=',$univ_id)
					   ->get();	

					   
			return view('foreigner.unitShow')
					->with('gre_unit_details',$gre_unit_details)
					->with('university_details',$university_details);
					

	}
}























