<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use Input;
use Illuminate\Http\Request;
use App\Filename;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Validator;

 
class ScienceController extends Controller
{


			  

		  public function convert($gpa_sub)
		   {
			 if($gpa_sub=='A+')
			  $gpa_sub=5.00;
			 else if($gpa_sub=='A')
			  $gpa_sub=4.00;
			 else if($gpa_sub=='A-')
			  $gpa_sub=3.50;
			 else if($gpa_sub=='B')
			  $gpa_sub=3.00;
			 else if($gpa_sub=='C')
			  $gpa_sub=2.00;
			 else if($gpa_sub=='D')
			  $gpa_sub=1.00;
			 else
			  return 0;
			 return $gpa_sub;
		   }


			public function checkScience()
		  {
			  
			//Taking all GPA
			  
				$Bangla=$this->convert(Input::get('ban'));
				$English=$this->convert(Input::get('eng'));
				$Physics=$this->convert(Input::get('phy'));
				$Chemistry=$this->convert(Input::get('chem'));
				$ICT=$this->convert(Input::get('ict'));
				$Biology=$this->convert(Input::get('bio'));
				$Mathematics=$this->convert(Input::get('math'));
				$Agri=$this->convert(Input::get('agri'));
				$Stat=$this->convert(Input::get('stat'));
				
			//end
				
				
				
				

			//checking main subject
			
			
				$optional= Input::get('optional') ;
				
				$main = Input::get('optional') ;
				
			  if($optional== 'bioe' &&  $this->convert(Input::get('math'))!=0)
				  $main =  Input::get('math');
			  
			  if($optional== 'bioe' &&  $this->convert(Input::get('stat'))!=0)
				  $main =  Input::get('stat');
			  
			  if($optional== 'bioe' &&  $this->convert(Input::get('agri'))!=0)
				  $main =  Input::get('agri');
			  
			  if($optional== 'mathe' &&  $this->convert(Input::get('stat'))!=0)
				  $main =  Input::get('stat');
			  
			  if($optional== 'mathe' &&  $this->convert(Input::get('agri'))!=0)
				  $main =  Input::get('agri');
			  
			  if($optional== 'mathe' &&  $this->convert(Input::get('bio'))!=0)
				  $main =  Input::get('bio');
			  
			 if($optional== 'state' &&  $this->convert(Input::get('agri'))!=0)
				  $main =  Input::get('agri');
			  
			  if($optional== 'state' &&  $this->convert(Input::get('bio'))!=0)
				  $main =  Input::get('bio');
			  
			  if($optional== 'state' &&  $this->convert(Input::get('stat'))!=0)
				  $main =  Input::get('stat');
			  
			  if($optional== 'agrie' &&  $this->convert(Input::get('math'))!=0)
				  $main =  Input::get('math');
			  
			  if($optional== 'agrie' &&  $this->convert(Input::get('bio'))!=0)
				  $main =  Input::get('bio');
			  
			  if($optional== 'agrie' &&  $this->convert(Input::get('stat'))!=0)
				  $main =  Input::get('stat');
			
			//end
			
			
			
				
			//checking optional subject
				
				$optional= Input::get('optional') ;
					
			  if($optional== 'bioe')
				  $optional =  Input::get('bio');
			  
			 if($optional== 'mathe')
				  $optional =  Input::get('math');
			  
			  if($optional== 'state')
				  $optional =  Input::get('stat');
			  
			  if($optional== 'agrie')
				  $optional =  Input::get('agri');
			  
			 //end

			 
			 
			 //checking if exactly 7 subjects have been filled
			 
				$x = 0;	
			
				if($Bangla != 0) $x++ ;
				if($English != 0) $x++ ;
				if($Physics != 0) $x++ ;
				if($Chemistry != 0) $x++ ;
				if($ICT != 0) $x++ ;
				if($Biology != 0) $x++ ;
				if($Mathematics != 0) $x++ ;
				if($Agri != 0) $x++ ;
				if($Stat != 0) $x++ ;
			
			
					if($x < 7)
				{
				Session::flash('message', "You submitted less then result of 7 subjects");
					return Redirect::back()->withInput();
				}
			
					if($x > 7)
				{
				Session::flash('message', "You submitted more then result of 7 subjects");
					return Redirect::back()->withInput();
				}

			 
			//end
			
			
			 
			 
			//calculating HSC GPA
			
			$optional_gpa = 0 ;
				
				if ($optional == 'A+') $optional_gpa = 3 ;
				if ($optional == 'A')  $optional_gpa = 2 ;
				if ($optional == 'A-') $optional_gpa = 1.5 ;
				if ($optional == 'B')  $optional_gpa = 1 ;
				if ($optional == 'C')  $optional_gpa = .5 ;
				
				
			$main_gpa = $this->convert($main);
			$hsc_gpa = ( $Bangla + $English + $Physics + $Chemistry + $ICT + $main_gpa + $optional_gpa ) / 6 ;
			$hsc_gpa = number_format($hsc_gpa, 2, '.', ',');
			
			if ($hsc_gpa  > 5 )
				$hsc_gpa  = 5 ;
				
						
			
			//end
			
			
			
			 
			//checking if optional subject is taken properly
			
				$Biology=$this->convert(Input::get('bio'));
				$Mathematics=$this->convert(Input::get('math'));
				$Agri=$this->convert(Input::get('agri'));
				$Stat=$this->convert(Input::get('stat'));
				
				$optional= Input::get('optional') ;
					
			  if($optional== 'mathe' and $Mathematics==0)
			  {
					Session::flash('message', "You did not submit your optional subject result ");
					return Redirect::back()->withInput();
			  }
			  
			  if($optional== 'state' and $Stat==0)
			  {
					Session::flash('message', "You did not submit your optional subject result ");
					return Redirect::back()->withInput();
			  }
			  
			  if($optional== 'Agrie' and $Biology==0)
			  {
					Session::flash('message', "You did not submit your optional subject result ");
					return Redirect::back()->withInput();
			  }
			  
			  if($optional== 'bioe' and $Biology==0)
			  {
					Session::flash('message', "You did not submit your optional subject result ");
					return Redirect::back()->withInput();
			  }
			  
			  
			  
			//end
			 
			 
				

				$ssc_gpa = Input::get('ssc_gpa');
				$hsc_gpa = (float)$hsc_gpa;
				$total_gpa =  $ssc_gpa + $hsc_gpa ;
				$phy_chem_math_eng_bang = (float)( $English + $Physics + $Mathematics + $Chemistry + $Bangla ) ;
				
				
				 
				 
			//Taking input in Database of all GPA in science_student Table

			if($ssc_gpa > 5 || $ssc_gpa < 2)
			  {
					Session::flash('message', "Insert SSC GPA properly ");
					return Redirect::back()->withInput();
			  }
			  
			$student_id = rand(10000000, 50000000);
			

			  
			//Inserting data to use further unit and dept requirements  
			DB::table('science_student')->insert(
			  [
			  'student_id'=>$student_id,
			  'gpa_bangla'=>$this->convert(Input::get('ban')),
			  'gpa_english'=>$this->convert(Input::get('eng')),
			  'gpa_physics'=>$this->convert(Input::get('phy')),
			  'gpa_chem'=>$this->convert(Input::get('chem')),			  
			  'gpa_biology'=>$this->convert(Input::get('bio')),
			  'gpa_math'=>$this->convert(Input::get('math')),
			  'gpa_agri'=>$this->convert(Input::get('agri')), 
			  'gpa_ssc'=>$ssc_gpa,
			  'gpa_hsc'=>$hsc_gpa,
			  'gpa_total'=>$total_gpa,
			  ]
				);
				
			
			
			//Starting Query for selected and non-selected universities
			
				$eligible_university =DB::table('universities')
				
					   ->where('universities.req_gpa_ssc','<=',$ssc_gpa)			   
					   ->where('universities.req_gpa_hsc','<=',$hsc_gpa)
					   ->where('universities.req_gpa_total','<=',$total_gpa)
					   ->where('universities.req_gpa_pcmeb','<=',$phy_chem_math_eng_bang)
					   ->where('universities.apply_off','>=',date('Y-m-d'))
					   ->groupBy('univ_full_name')
					   ->orderBy('univ_full_name','ASC')
					   ->get();

						

				$uneligible_university = DB::table('universities')
					   ->where('universities.req_gpa_ssc','>',$ssc_gpa)
					   ->orwhere('universities.req_gpa_hsc','>',$hsc_gpa)
					   ->orwhere('universities.req_gpa_total','>',$total_gpa)
					   ->orwhere('universities.req_gpa_pcmeb','>',$phy_chem_math_eng_bang)
					   ->groupBy('univ_full_name')
					   ->orderBy('univ_full_name','ASC')
					   ->get(); 				   

				$apply_out_of_date_university = DB::table('universities')
				
					   ->where('universities.req_gpa_ssc','<=',$ssc_gpa)			   
					   ->where('universities.req_gpa_hsc','<=',$hsc_gpa)
					   ->where('universities.req_gpa_total','<=',$total_gpa)
					   ->where('universities.req_gpa_pcmeb','<=',$phy_chem_math_eng_bang)
					   ->where('universities.apply_off','<',date('Y-m-d'))
					   ->groupBy('univ_full_name')
					   ->orderBy('univ_full_name','ASC')
					   ->get();
			//end
			   



		return view('students.univShow')
		  ->with('eligible_university', $eligible_university)
			->with('uneligible_university', $uneligible_university)
			  ->with('apply_out_of_date_university', $apply_out_of_date_university)
				->with('student_id',$student_id)
					->with('group','S'); 
					
					//S defines he is a Science student

				
				
		  
		  
		}
		
		
		public function science_unit_finding($univ_id,$student_id,$group)
		{
				$gpa_info = DB::table('science_student')
					   ->where('student_id','=',$student_id)			   
					   ->get();	
				
					   
				$science_unit_details = DB::table('all_nctb_curriculum_units')
				
					   ->where('univ_id','=',$univ_id)
					   ->where('unit_belongs_to','=',$group)
					   ->where('req_gpa_ssc','<=',$gpa_info[0]->gpa_ssc)			   
					   ->where('req_gpa_hsc','<=',$gpa_info[0]->gpa_hsc)
					   ->where('req_gpa_total','<=',$gpa_info[0]->gpa_total)
					   ->where('req_gpa_math','<=',$gpa_info[0]->gpa_math)
					   ->where('req_gpa_physics','<=',$gpa_info[0]->gpa_physics)
					   ->where('req_gpa_chem','<=',$gpa_info[0]->gpa_chem)
					   ->where('req_gpa_biology','<=',$gpa_info[0]->gpa_biology)
					   ->get();
					   
				$all_allowed_unit_details = DB::table('all_nctb_curriculum_units')
				
					   ->where('univ_id','=',$univ_id)
					   ->where('unit_belongs_to','=','A')
					   ->where('req_gpa_ssc','<=',$gpa_info[0]->gpa_ssc)			   
					   ->where('req_gpa_hsc','<=',$gpa_info[0]->gpa_hsc)
					   ->where('req_gpa_total','<=',$gpa_info[0]->gpa_total)
					   ->where('req_gpa_bangla','<=',$gpa_info[0]->gpa_bangla)
					   ->where('req_gpa_english','<=',$gpa_info[0]->gpa_english)
					   ->get();		
					   

				$all_unit_details = $science_unit_details->merge($all_allowed_unit_details);

				
				$university_details = DB::table('universities')
				
					   ->where('univ_id','=',$univ_id)
					   ->get();	
					   
				return view('students.unitShow')
					->with('all_unit_details',$all_unit_details)
					->with('university_details',$university_details)
					->with('student_id',$student_id)
					->with('group',$group);
				
		}
		
		public function science_dept_finding($unit_id,$student_id,$group)
		{
				$eligible_dept_details = DB::table('all_depts')
				
					   ->where('unit_id','=',$unit_id)
					   ->get();	
				
				$unit_details = DB::table('all_nctb_curriculum_units')
				
					   ->where('unit_id','=',$unit_id)
					   ->get();
					   
				$university_details = DB::table('universities')
				
					   ->where('univ_id','=',$unit_details[0]->univ_id)
					   ->get();
				
				return view('students.deptShow')
				->with('eligible_dept_details',$eligible_dept_details)
					->with('unit_details',$unit_details)				
						->with('university_details',$university_details);
		}
			
			

				


}