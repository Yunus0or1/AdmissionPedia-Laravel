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
use DateTime;
use Carbon\carbon;
use json_decode;
use json_encode;

class universityInformation extends Controller
{
	
	//ADMIN PANEL 
	public function adduniversity()
	{
			
		return view('universityInformation.adduniversity')->with('message','');;
		
	}
	
	public function addeduniversity()
	{	
		$input = Input::all();
		
		$number_of_units  = $input['univ_unit_number'];
		$unit_description = $input['univ_unit_desc'];
		
		$unit = array();
		$unit_number = 0;
		
		//Adding comma as a delimiter . Inserting comma first and last
		$a = ',';
		for($i=0;$i<strlen($unit_description);$i++)
		{
			$a = $a.$unit_description[$i];
			
		}
		$a = $a.',' ;
		
		//Breaking $unit_description into real units.
		for($i=1;$i<strlen($a);$i++)
		{	
			$temp = '' ;
			$temp2 = '' ;
			$j  =  $i ;
			$k = $i;
			
			if($a[$i] == ':')
			{
				$j = $j - 1 ; //This will go backward and insert unitname
				$k = $k + 1 ; //This will go forward and insert the unit science or commerce or all category
				
				while ($a[$j] != ','){
					
					$temp  = $temp.$a[$j];
					$j = $j -1;
				
				}
				
				while ($a[$k] != ','){
					
					$temp2  = $temp2.$a[$k];
					$k = $k + 1;
				
				}				
				
				$unit[$unit_number] = array(strrev($temp),$temp2) ;
				$unit_number++ ; 
			}
						
			
		}	
	
		//Counting all individual units.
		$science_unit = 0;
		$commerce_unit = 0;
		$all_allowed_unit = 0;

		for($i=0; $i<$number_of_units; $i++)
		{
			if($unit[$i][1]=='S')
			{
				$science_unit++;
			}
			else if($unit[$i][1]=='C')
			{
				$commerce_unit++;
			}
			else if($unit[$i][1]=='A')
			{
				$all_allowed_unit++;
			}

		}				
		
		
		DB::table('universities')->insert(
          [
          'univ_full_name'=>$input['univ_full_name'],
          'univ_short_name'=>$input['univ_short_name'],
		  'total_seat'=>$input['total_seat'],
		  'total_unit'=>$input['univ_unit_number'],
		  'unit_description' => $input['univ_unit_desc'],
		  'total_science_unit'=>$science_unit,
		  'total_commerce_unit'=>$commerce_unit,
		  'total_all_allowed_unit'=>$all_allowed_unit,
		  'apply_start'=>$input['apply_start'],
		  'apply_off'=>$input['apply_off'],
		  'req_gpa_ssc'=>$input['req_gpa_ssc'],
		  'req_gpa_hsc'=>$input['req_gpa_hsc'],
		  'req_gpa_total'=>$input['req_gpa_total'],
		  'req_gpa_pcmeb'=>$input['req_gpa_pcmeb'],
		  'allow_second_timer'=>$input['allow_second_timer'],
		  'deduction'=>$input['deduction'],
		  'prospectus_based_on_year'=>$input['prospectus_based_on_year'],
		  'prospectus_link'=>$input['prospectus_link'],
		  'website'=>$input['website'],
		  'gre_score'=>$input['gre_score'],
		  
          ]
        	);		
		
		
	
			
		$lastRecord = DB::table('universities')->orderBy('univ_id', 'DESC')->take(1)->get();
		
		$univ_id = (int)$lastRecord[0]->univ_id;
		
			
			
		for($i=0; $i<$number_of_units; $i++)
		{
			if($unit[$i][1]=='S')
			{
				DB::table('all_nctb_curriculum_units')->insert(
					  [
					  'univ_id'=>$univ_id,
					  'unit_name' => $unit[$i][0],
					  'unit_belongs_to' => 'S',
					  
					  ]
						);
			}
			else if($unit[$i][1]=='C')
			{
				DB::table('all_nctb_curriculum_units')->insert(
					  [
					  'univ_id'=>$univ_id,
					  'unit_name' => $unit[$i][0],
					  'unit_belongs_to' => 'C',
					  
					  ]
						);
			}
			else if($unit[$i][1]=='A')
			{
				DB::table('all_nctb_curriculum_units')->insert(
					  [
					  'univ_id'=>$univ_id,
					  'unit_name' => $unit[$i][0],
					  'unit_belongs_to' => 'A',					  
					  ]
						);				
			}
		}
		
		
		return view('universityInformation.adduniversity')->with('message','You have added a University successfully');
		
	}
	
	public function edituniversity()
	{
		$universitylist =DB::table('universities')

               ->get(); 
		
	
		return view('universityInformation.edituniversity')->with('universitylist',$universitylist);
		
	}

	public function selecteduniversity(Request $request)
	{

		if(Input::get('university_editing')){
			
			$univ_id = Input::get('univ_id');
				
			$universitydetails =DB::table('universities')
			    ->where('univ_id','=', $univ_id)
                ->get();
				
		
			return view('universityInformation.editUniversityDetails')->with('universitydetails',$universitydetails);
			
			}
			 
		if(Input::get('unit_editing')){
			
			$univ_id = Input::get('univ_id');
			
			$universitydetails =DB::table('universities')
			    ->where('univ_id','=', $univ_id)
                ->get();
			
			$unitdetails = DB::table('all_nctb_curriculum_units')
			    ->where('univ_id','=', $univ_id)			
                ->get();
				

			   
			return view('universityInformation.editUnit')
			->with('universitydetails',$universitydetails)
			->with('unitdetails',$unitdetails);
			
			}

		
	}
	
	
	
	
	public function updateuniversitydetails()
	{	
		$input = Input::all();
		
		$univ_id = Input::get('univ_id');
		
		$universitydetails =DB::table('universities')
			    ->where('univ_id','=', $univ_id)
                ->get();
		
		$previous_unit_description = $universitydetails[0]->unit_description;
		$new_unit_description = $input['univ_unit_desc'];
		

		//This finds out if unit is changed of a university
		if($previous_unit_description == $new_unit_description)
		{
			
		DB::table('universities')
            ->where('univ_id','=', $univ_id)
            ->update([         
		  'univ_full_name'=>$input['univ_full_name'],
          'univ_short_name'=>$input['univ_short_name'],
		  'total_seat'=>$input['total_seat'],
		  'apply_start'=>$input['apply_start'],
		  'apply_off'=>$input['apply_off'],
		  'req_gpa_ssc'=>$input['req_gpa_ssc'],
		  'req_gpa_hsc'=>$input['req_gpa_hsc'],
		  'req_gpa_total'=>$input['req_gpa_total'],
		  'req_gpa_pcmeb'=>$input['req_gpa_pcmeb'],
		  'allow_second_timer'=>$input['allow_second_timer'],
		  'deduction'=>$input['deduction'],
		  'prospectus_based_on_year'=>$input['prospectus_based_on_year'],
		  'prospectus_link'=>$input['prospectus_link'],
		  'website'=>$input['website'],
		  'gre_score'=>$input['gre_score'],
		  ]);
		  
		  
		$universitydetails =DB::table('universities')
			    ->where('univ_id','=', $univ_id)
                ->get();
				
			
		return view('universityInformation.editUniversityDetails')->with('universitydetails',$universitydetails);
		
		}
		
		//If unit changes the whole university units refreshes.
		else if($previous_unit_description != $new_unit_description)
		{
			
			DB::table('universities')
				->where('univ_id','=', $univ_id)
				->delete();
			DB::table('science_unit')
				->where('univ_id','=', $univ_id)
				->delete();
			DB::table('commerce_unit')
				->where('univ_id','=', $univ_id)
				->delete();
			DB::table('all_allowed_unit')
				->where('univ_id','=', $univ_id)
				->delete();
				
			$input = Input::all();
			
			$number_of_units  = $input['univ_unit_number'];
			$unit_description = $input['univ_unit_desc'];
			
			$unit = array();
			$unit_number = 0;
			
			//Adding comma as a delimiter . Inserting comma first and last
			$a = ',';
			for($i=0;$i<strlen($unit_description);$i++)
			{
				$a = $a.$unit_description[$i];
				
			}
			$a = $a.',' ;
			
			//Breaking $unit_description into real units.
			for($i=1;$i<strlen($a);$i++)
			{	
				$temp = '' ;
				$temp2 = '' ;
				$j  =  $i ;
				$k = $i;
				
				if($a[$i] == ':')
				{
					$j = $j - 1 ; //This will go backward and insert unitname
					$k = $k + 1 ; //This will go forward and insert the unit science or commerce or all category
					
					while ($a[$j] != ','){
						
						$temp  = $temp.$a[$j];
						$j = $j -1;
					
					}
					
					while ($a[$k] != ','){
						
						$temp2  = $temp2.$a[$k];
						$k = $k + 1;
					
					}				
					
					$unit[$unit_number] = array(strrev($temp),$temp2) ;
					$unit_number++ ; 
				}
							
				
			}	
		
			//Counting all individual units.
			$science_unit = 0;
			$commerce_unit = 0;
			$all_allowed_unit = 0;

			for($i=0; $i<$number_of_units; $i++)
			{
				if($unit[$i][1]=='S')
				{
					$science_unit++;
				}
				else if($unit[$i][1]=='C')
				{
					$commerce_unit++;
				}
				else if($unit[$i][1]=='A')
				{
					$all_allowed_unit++;
				}

			}				
			
			
			DB::table('universities')->insert(
			  [
			  'univ_full_name'=>$input['univ_full_name'],
			  'univ_short_name'=>$input['univ_short_name'],
			  'total_seat'=>$input['total_seat'],
			  'total_unit'=>$input['univ_unit_number'],
			  'unit_description' => $input['univ_unit_desc'],
			  'total_science_unit'=>$science_unit,
			  'total_commerce_unit'=>$commerce_unit,
			  'total_all_allowed_unit'=>$all_allowed_unit,
			  'apply_start'=>$input['apply_start'],
			  'apply_off'=>$input['apply_off'],
			  'req_gpa_ssc'=>$input['req_gpa_ssc'],
			  'req_gpa_hsc'=>$input['req_gpa_hsc'],
			  'req_gpa_total'=>$input['req_gpa_total'],
			  'req_gpa_pcmeb'=>$input['req_gpa_pcmeb'],
			  'allow_second_timer'=>$input['allow_second_timer'],
			  'deduction'=>$input['deduction'],
			  'prospectus_based_on_year'=>$input['prospectus_based_on_year'],
			  'prospectus_link'=>$input['prospectus_link'],
			  'website'=>$input['website'],
			  'gre_score'=>$input['gre_score'],
			  ]
				);		
			
			
		
				
			$lastRecord = DB::table('universities')->orderBy('univ_id', 'DESC')->take(1)->get();
			
			$univ_id = (int)$lastRecord[0]->univ_id;
			
				
				
			for($i=0; $i<$number_of_units; $i++)
			{
				if($unit[$i][1]=='S')
				{
					DB::table('all_nctb_curriculum_units')->insert(
						  [
						  'univ_id'=>$univ_id,
						  'unit_name' => $unit[$i][0],
						  'unit_belongs_to' => 'S',
						  
						  ]
							);
				}
				else if($unit[$i][1]=='C')
				{
					DB::table('all_nctb_curriculum_units')->insert(
						  [
						  'univ_id'=>$univ_id,
						  'unit_name' => $unit[$i][0],
						  'unit_belongs_to' => 'C',
						  
						  ]
							);
				}
				else if($unit[$i][1]=='A')
				{
					DB::table('all_nctb_curriculum_units')->insert(
						  [
						  'univ_id'=>$univ_id,
						  'unit_name' => $unit[$i][0],
						  'unit_belongs_to' => 'A',					  
						  ]
							);				
				}
			}

			$universitydetails =DB::table('universities')
			    ->where('univ_id','=', $univ_id)
                ->get();
				
			
			return view('universityInformation.editUniversityDetails')->with('universitydetails',$universitydetails);
		
		}
		
	}
	
	
	
	
	
	
	public function editunit()
	{
		if(Input::get('unit_editing'))
		{
			
			//Defining which type of syllabus. 1 = NCTB curriculum , 2= English medium 3= GRE
			
			if(Input::get('unit_editing_type') == 1)
				
			{		
				
					$input = Input::all();
					
					$unit_id = $input['unit_id'];
					

					
					$unitdetails =DB::table('all_nctb_curriculum_units')
						->where('unit_id','=', $unit_id)
						->get();
						
						

					$univ_id = $unitdetails[0]->univ_id ;
						
					$universitydetails =DB::table('universities')
						->where('univ_id','=', $univ_id)
						->get();
						
					return view('universityInformation.editUnitDetails')
					->with('universitydetails',$universitydetails)
					->with('unitdetails',$unitdetails);	
			}					
				
		}
			 
		if(Input::get('subject_editing'))
		{
			$input = Input::all();
			$unit_id = $input['unit_id'];
			$editing_type_syllabus = Input::get('unit_editing_type'); //Means which type NCTB or English medium
			

			$unit_details =DB::table('all_nctb_curriculum_units')
			->where('unit_id','=', $unit_id)
			->get(); 
			
			$university_details = DB::table('universities')
			->where('univ_id','=', $unit_details[0]->unit_id)
			->get(); 
			
			$dept_details =DB::table('all_depts')
			->where('unit_id','=', $unit_id)
			->get();
			
			
			
			return view('universityInformation.editSubject')
				->with('universitydetails',$university_details)
				->with('unitdetails',$unit_details)
				->with('deptdetails',$dept_details)
				->with('editing_type_syllabus',$editing_type_syllabus)
				->with('unit_id',$unit_id);
					
		}
	}
	
	
	public function updateunitdetails()
	
	{
		$input = Input::all();
		$unit_id = $input['unit_id'] ;
		
		//Inserting the common fields of all units
		DB::table('all_nctb_curriculum_units')
		->where('unit_id','=', $unit_id)
		->update(
			  [

			  'total_seat'=>$input['total_seat'],
			  'exam_date'=>$input['exam_date'],
			  'day'=>$input['day'],
			  'exact_time' => $input['exact_time'],
			  'system_of_apply'=>$input['system_of_apply'],
			  'form_price'=>$input['form_price'],
			  'req_gpa_ssc'=>$input['req_gpa_ssc'],
			  'req_gpa_hsc'=>$input['req_gpa_hsc'],
			  'req_gpa_total'=>$input['req_gpa_total'],

			  ]
				);		

				
		$unit_belongs_to  = $input['unit_belongs_to'] ;
		
		//Defining which part to save based on S=Science,C=Commerce,A=All allowed
		if($unit_belongs_to == 'S')
		{
			DB::table('all_nctb_curriculum_units')	
			->where('unit_id','=', $unit_id)
			->update(
			  [
			  'req_gpa_math'=>$input['req_gpa_math'],
			  'req_gpa_physics'=>$input['req_gpa_physics'],
			  'req_gpa_chem'=>$input['req_gpa_chem'],
			  'req_gpa_biology'=>$input['req_gpa_biology'],

			  ]
				);	
			
		}
		
		if($unit_belongs_to == 'C')
		{
			DB::table('all_nctb_curriculum_units')
			->where('unit_id','=', $unit_id)
			->update(
			  [
			  'req_gpa_business_management'=>$input['req_gpa_business_management'],
			  'req_gpa_accounting'=>$input['req_gpa_accounting'],
			  'req_gpa_finance'=>$input['req_gpa_finance'],
			  'req_gpa_marketing'=>$input['req_gpa_marketing'],
			  'req_gpa_economics'=>$input['req_gpa_economics'],

			  ]
				);	
			
		}		
		
		if($unit_belongs_to == 'A')
		{	
		DB::table('all_nctb_curriculum_units')
			->where('unit_id','=', $unit_id)
			->update([
			  'req_gpa_bangla'=>$input['req_gpa_bangla'],
			  'req_gpa_english'=>$input['req_gpa_english'],
			  
			  ]
				);			
		}

		return redirect('/edituniversity');
		
		
	}
	
	
		public function addsubject($unit_id,$editing_type_syllabus)
		{
			// 1 means NCTB curriculm 2 means English medium
			if( $editing_type_syllabus == 1);
			{
				$unit_details =DB::table('all_nctb_curriculum_units')
							->where('unit_id','=', $unit_id)
							->get();
				
				$university_details = DB::table('universities')
							->where('univ_id','=', $unit_details[0]->univ_id)
							->get();	
			
				return view('universityInformation.addsubject')
				->with('universitydetails',$university_details)
				->with('unitdetails',$unit_details);

			}
		}
		
		public function subject_added()
		{
			$input = Input::all();
			
			$dept_name = $input['dept_name'];
			$unit_id = $input['unit_id'];
			$dept_belongs_to = $input['unit_belongs_to'];	
			$total_seat = $input['total_seat'];
			$editing_type_syllabus = Input::get('unit_editing_type');
			
			DB::table('all_depts')->insert(
			  [
			  'dept_name'=>$dept_name,
			  'unit_id'=>$unit_id,
			  'dept_belongs_to'=>$dept_belongs_to,
			  'total_seat'=>$total_seat,

			  ]
				);
			
				
			$unit_details =DB::table('all_nctb_curriculum_units')
			->where('unit_id','=', $unit_id)
			->get(); 
			
			$university_details = DB::table('universities')
			->where('univ_id','=', $unit_details[0]->unit_id)
			->get(); 
			
			$dept_details =DB::table('all_depts')
			->where('unit_id','=', $unit_id)
			->get();
			

			
			return view('universityInformation.editSubject')
				->with('universitydetails',$university_details)
				->with('unitdetails',$unit_details)
				->with('deptdetails',$dept_details)
				->with('editing_type_syllabus',$editing_type_syllabus)
				->with('unit_id',$unit_id);
				
				
			


			

		}
		
		
		
		public function updatedept($dept_id)
		{
		
			$dept_details =DB::table('all_depts')
				->where('dept_id','=', $dept_id)
				->get();
				
			return view('universityInformation.updateDept')->with('dept_details',$dept_details);
			
		}
		
		
		public function dept_updated()
		{
			$input = Input::all();
			
			$dept_belongs_to = $input['dept_belongs_to']; //Whether to insert as Science/Commerce/All
			$dept_id = $input['dept_id'];
			
			
			//Inserting common fields
			DB::table('all_depts')
			->where('dept_id','=', $dept_id)
			->update(
				  [
				  'dept_name'=>$input['dept_name'],	
				  'total_seat'=>$input['total_seat'],
				  'req_gpa_ssc'=>$input['req_gpa_ssc'],
			      'req_gpa_hsc'=>$input['req_gpa_hsc'],
			      'req_gpa_total'=>$input['req_gpa_total'],			
				  ]
					);			
			
			if($dept_belongs_to == 'S')
					{
						DB::table('all_depts')	
						->where('dept_id','=', $dept_id)
						->update(
						  [
						  'req_gpa_math'=>$input['req_gpa_math'],
						  'req_gpa_physics'=>$input['req_gpa_physics'],
						  'req_gpa_chem'=>$input['req_gpa_chem'],
						  'req_gpa_biology'=>$input['req_gpa_biology'],

						  ]
							);	
						
					}
					
			if($dept_belongs_to == 'C')
					{
						DB::table('all_depts')
						->where('dept_id','=', $dept_id)
						->update(
						  [
						  'req_gpa_business_management'=>$input['req_gpa_business_management'],
						  'req_gpa_accounting'=>$input['req_gpa_accounting'],
						  'req_gpa_finance'=>$input['req_gpa_finance'],
						  'req_gpa_marketing'=>$input['req_gpa_marketing'],
						  'req_gpa_economics'=>$input['req_gpa_economics'],

						  ]
							);	
						
					}		
					
			if($dept_belongs_to == 'A')
					{
						
					DB::table('all_depts')
						->where('dept_id','=', $dept_id)
						->update([
						  'req_gpa_bangla'=>$input['req_gpa_bangla'],
						  'req_gpa_english'=>$input['req_gpa_english'],
						  
						  ]
							);
					}
					
			//Rendering editUnit Page again just to make this very smooth transaction
			
			$dept_details =DB::table('all_depts')
				->where('dept_id','=', $dept_id)
				->get();
				
			
			$editing_type_syllabus = $dept_details[0]->dept_belongs_to;
			$unit_id = $dept_details[0]->unit_id ;
			
			$unit_details =DB::table('all_nctb_curriculum_units')
			->where('unit_id','=', $unit_id)
			->get(); 
			
			$university_details = DB::table('universities')
			->where('univ_id','=', $unit_details[0]->unit_id)
			->get(); 
			
			$dept_details =DB::table('all_depts')
			->where('unit_id','=', $unit_id)
			->get();
			

			
			return view('universityInformation.editSubject')
				->with('universitydetails',$university_details)
				->with('unitdetails',$unit_details)
				->with('deptdetails',$dept_details)
				->with('editing_type_syllabus',$editing_type_syllabus)
				->with('unit_id',$unit_id)
				->with('message','You have update a department');
			
			
		}
		
		
		
		
}

























































