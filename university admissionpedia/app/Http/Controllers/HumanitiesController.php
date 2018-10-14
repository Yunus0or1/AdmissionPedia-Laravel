<?php

/**
* 
*/

class HumanitiesController extends BaseController
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

	public function checkHumanities()
  {
    $data = Input::all();
    $rules = array(
            'ssc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/',
            'ssc_gpa_without_optional' => 'required|regex:/^\d*(\.\d{2})?$/',
            'hsc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/',
            'hsc_gpa_without_optional' => 'required|regex:/^\d*(\.\d{2})?$/'
        );
        


    $validator =  Validator::make($data, $rules);

    if($validator->fails())
    return Redirect::back()->withInput()->withErrors($validator->messages());
        
        DB::table('humanities_student')->delete();
        DB::table('humanities_student')->insert(
          [
          'primary_id'=>1,
          'Bangla'=>Input::get('bangla'),
          'English'=>Input::get('english'),
          'Civics'=>Input::get('civics'),
          'Logic'=>Input::get('logic'),
          'History'=>Input::get('history'),
          'Islamic_History'=>Input::get('islamic_history'),
          'Islamic_Studies'=>Input::get('islamic_studies'),
          'Sociology'=>Input::get('sociology'),
          'Social_Welfare'=>Input::get('social_welfare'),
          'Economics'=>Input::get('economics'),
          'Statistics'=>Input::get('statistics'),
          'Geography'=>Input::get('geography'),
          'Mathmatics'=>Input::get('mathmatics'),
          'Psychology'=>Input::get('psychology'),
          'Highest_gpa'=>Input::get('high_gpa'),
          
          'ssc_gpa'=>Input::get('ssc_gpa'),
          'hsc_gpa'=>Input::get('hsc_gpa'),
          'ssc_gpa_without_4th_subject'=>Input::get('ssc_gpa_without_optional'),
          'hsc_gpa_without_4th_subject'=>Input::get('hsc_gpa_without_optional')
          ]
          );

    $ssc_gpa = (float) Input::get('ssc_gpa');
    $hsc_gpa = (float) Input::get('hsc_gpa');
    $ssc_gpa_without_optional= (float) Input::get('ssc_gpa_without_optional');
    $hsc_gpa_without_optional=(float) Input::get('hsc_gpa_without_optional');

    $pass_year=Input::get('pass_year');

      $info =DB::table('universities')
               ->where('universities.year_allowed','<=',$pass_year)
               ->join('units','universities.univ_id','=','units.univ_id')
                
               ->where('units.group_id','=',3)

               ->where('units.ssc_req_with_optional','<=',$ssc_gpa)
               ->where('units.hsc_req_with_optional','<=',$ssc_gpa)
               ->where('units.total_req_with_optional','<=',$ssc_gpa+$hsc_gpa)

               ->where('units.ssc_req_without_optional','<=',$ssc_gpa_without_optional)
               ->where('units.hsc_req_without_optional','<=',$hsc_gpa_without_optional)
               ->where('units.total_req_without_optional','<=',$ssc_gpa_without_optional+$hsc_gpa_without_optional)
               ->distinct()
               ->groupBy('univ_name')
               ->get();
         
         $info1=DB::table('universities')
               ->join('units','universities.univ_id','=','units.univ_id')
               ->where('units.group_id','=',3)
               ->distinct()
               ->groupBy('univ_name')
               ->get();

      $unselected_univ=[];
       $unselected_univ_id=[];
       $i=0;
       foreach ($info1 as $info1)
       {
         $check=0;
         foreach($info as $test_info)
         {
          if($info1->univ_name==$test_info->univ_name)
          $check=1;  
         }
         if($check==0)
         {
          $unselected_univ[$i]=$info1->univ_name;
          $unselected_univ_id[$i]=$info1->univ_id;
          $i++;
         }
       }

      $group_id=3;
 
       return View::make('students.univShow')->with('info', $info)->with('data',$data)->with('unselected_univ',$unselected_univ)->with('unselected_univ_id',$unselected_univ_id)->with('group_id',$group_id);    


     //          return View::make('students.univShow')->with('info', $info)->with('data',$data);
  }

     public function dept($univ_id,$unit_id,$group_id)
  {
    $student = DB::table('humanities_student')->where('primary_id','=',1)->first();

    $gpa_bng=$student->Bangla;
    $gpa_bng=$this->convert($gpa_bng);
    $gpa_eng=$student->English;
    $gpa_eng=$this->convert($gpa_eng);
    $gpa_civics=$student->Civics;
    $gpa_civics=$this->convert($gpa_civics);
    $gpa_logic=$student->Logic;
    $gpa_logic=$this->convert($gpa_logic);
    $gpa_history=$student->History;
    $gpa_history=$this->convert($gpa_history);
    $gpa_islamic_history=$student->Islamic_History;
    $gpa_islamic_history=$this->convert($gpa_islamic_history);
    $gpa_islamic_studies=$student->Islamic_Studies;
    $gpa_islamic_studies=$this->convert($gpa_islamic_studies);
    $gpa_sociology=$student->Sociology;
    $gpa_sociology=$this->convert($gpa_sociology);
    $gpa_social_welfare=$student->Social_Welfare;
    $gpa_social_welfare=$this->convert($gpa_social_welfare);
    $gpa_eco=$student->Economics;
    $gpa_eco=$this->convert($gpa_eco);
    $gpa_sta=$student->Statistics;
    $gpa_sta=$this->convert($gpa_sta);
    $gpa_geography=$student->Geography;
    $gpa_geography=$this->convert($gpa_geography);
    $gpa_math=$student->Mathmatics;
    $gpa_math=$this->convert($gpa_math);
    $gpa_psychology=$student->Psychology;
    $gpa_psychology=$this->convert($gpa_psychology);
    $gpa_high=$student->Highest_gpa;
    $gpa_high=$this->convert($gpa_high);
    $gpa_ssc=$student->ssc_gpa;
    $gpa_hsc=$student->hsc_gpa;

    $temp_depts=DB::table('universities')
              ->join('units','universities.univ_id','=','units.univ_id')
              ->where('units.unit_id', '=', $unit_id)
              ->where('units.group_id','=',3)
              ->distinct()
              ->get();

       $departments = DB::table('humanities_departments')->get();

    $depts= [] ;
    $non_selected_depts=[];

    foreach ($temp_depts as $temp_dept) {
      foreach ($departments as $department) {
        if(
               $department->unit_id==$temp_dept->unit_id
          )
        {
        $dept_name=$department->dept_name;

      if($department->all_sub=='yes')
      {
      if($gpa_bng>=$department->Bangla
            && $gpa_eng>=$department->English
            && $gpa_civics>=$department->Civics
            && $gpa_logic>=$department->Logic
            && $gpa_history>=$department->History
            && $gpa_islamic_history>=$department->Islamic_History
            && $gpa_islamic_studies>=$department->Islamic_Studies
            && $gpa_sociology>=$department->Sociology
            && $gpa_social_welfare>=$department->Social_Welfare
            && $gpa_eco>=$department->Economics
            && $gpa_sta>=$department->Statistics
            && $gpa_geography>=$department->Geography
            && $gpa_math>=$department->Mathmatics
            && $gpa_psychology>=$department->Psychology
            && $gpa_high>=$department->Highest_gpa
            && $gpa_ssc>=$department->ssc_req_with_optional
            && $gpa_hsc>=$department->hsc_req_with_optional
            && ($gpa_ssc+$gpa_hsc)>=$department->total_req_with_optional
              )
         {      
      $depts[]= DB::table('humanities_departments')
        ->where('humanities_departments.unit_id','=',$unit_id)
        ->where('humanities_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }
         else
         {
        $non_selected_depts[]= DB::table('humanities_departments')
        ->where('humanities_departments.unit_id','=',$unit_id)
        ->where('humanities_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }
        }

        else
      {
      if(  (   ($gpa_bng>=$department->Bangla && $department->Bangla!=0)
            || ($gpa_eng>=$department->English && $department->English!=0)
            || ($gpa_civics>=$department->Civics && $department->Civics!=0)
            || ($gpa_logic>=$department->Logic && $department->Logic!=0)
            || ($gpa_history>=$department->History && $department->History!=0)
            || ($gpa_islamic_history>=$department->Islamic_History && $department->Islamic_History!=0)
            || ($gpa_islamic_studies>=$department->Islamic_Studies && $department->Islamic_Studies!=0)
            || ($gpa_sociology>=$department->Sociology && $department->Sociology!=0)
            || ($gpa_social_welfare>=$department->Social_Welfare && $department->Social_Welfare!=0)
            || ($gpa_eco>=$department->Economics && $department->Economics!=0)
            || ($gpa_sta>=$department->Statistics && $department->Statistics!=0)
            || ($gpa_geography>=$department->Geography && $department->Geography!=0)
            || ($gpa_math>=$department->Mathmatics && $department->Mathmatics!=0)
            || ($gpa_psychology>=$department->Psychology && $department->Psychology!=0)
            || ($gpa_high>=$department->Highest_gpa && $department->Highest_gpa!=0)
            )
            && 
            ($gpa_ssc>=$department->ssc_req_with_optional
            && $gpa_hsc>=$department->hsc_req_with_optional
            && ($gpa_ssc+$gpa_hsc)>=$department->total_req_with_optional)
           )
         {      
      $depts[]= DB::table('humanities_departments')
        ->where('humanities_departments.unit_id','=',$unit_id)
        ->where('humanities_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }
         else
         {
          $non_selected_depts[]= DB::table('humanities_departments')
        ->where('humanities_departments.unit_id','=',$unit_id)
        ->where('humanities_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }

        }

    }
           }
    }
        return View::make('students.deptShow')->with('depts', $depts)->with('non_selected_depts',$non_selected_depts)->with('group_id',$group_id);
// return View::make('students.deptShow')->with('depts', $depts);
         
  }

   public function req_check($unit_id,$group_id,$dept_name)
   {
  //  return "hello";
    $index_unit=0;
    $index_dept=0;
    $unit_req=DB::table('units')
          ->where('units.unit_id','=',$unit_id)
          ->first();

    if($unit_req->with_optional=='yes')
    {
      $req_unit[$index_unit++]="SSC GPA (with optional) must be greater than or equal $unit_req->ssc_req_with_optional";
      $req_unit[$index_unit++]="HSC GPA (with optional) must be greater than or equal $unit_req->hsc_req_with_optional";
      $req_unit[$index_unit++]="Total SSC & HSC GPA must be equal or greater than $unit_req->total_req_with_optional";
    }
    else
    {
      $req_unit[$index_unit++]="SSC GPA(without optional) must be greater than or equal $unit_req->ssc_req_without_optional";
      $req_unit[$index_unit++]="HSC GPA(without optional) must be greater than or equal $unit_req->hsc_req_without_optional";
      $req_unit[$index_unit++]="Total GPA(without optional) must be greater than or equal $unit_req->total_req_without_optional";
    }

    $dept_req= DB::table('humanities_departments')
        ->where('humanities_departments.unit_id','=',$unit_id)
        ->where('humanities_departments.dept_name','=',$dept_name)
        ->distinct()
        ->first();
      
  //  $req_dept[$index_dept++]=$dept_req->all_sub;
    $req_dept=[];

    $all_sub=$dept_req->all_sub;
    
    
    if($dept_req->Highest_gpa>0)
    $req_dept[$index_dept++]="$dept_req->Highest_gpa in any Humanities Subject";

    if($dept_req->Bangla>0)
    $req_dept[$index_dept++]="Bangla----$dept_req->Bangla";
    if($dept_req->English>0)
    $req_dept[$index_dept++]="English----$dept_req->English";
    if($dept_req->Civics>0)
    $req_dept[$index_dept++]="Civics----$dept_req->Civics";
    if($dept_req->Logic>0)
    $req_dept[$index_dept++]="Logic----$dept_req->Logic";
    if($dept_req->History>0)
    $req_dept[$index_dept++]="Introduction_to_Business----$dept_req->History";
    if($dept_req->Statistics>0)
    $req_dept[$index_dept++]="Statistics----$dept_req->Statistics";
    if($dept_req->Islamic_History>0)
    $req_dept[$index_dept++]="Islamic_History----$dept_req->Islamic_History";
    if($dept_req->Islamic_Studies>0)
    $req_dept[$index_dept++]="Islamic_Studies----$dept_req->Islamic_Studies";
    if($dept_req->Sociology>0)
    $req_dept[$index_dept++]="Sociology----$dept_req->Sociology";
    if($dept_req->Social_Welfare>0)
    $req_dept[$index_dept++]="Social_Welfare----$dept_req->Social_Welfare";
    if($dept_req->Economics>0)
    $req_dept[$index_dept++]="Economics----$dept_req->Economics";
    if($dept_req->Geography>0)
    $req_dept[$index_dept++]="Geography----$dept_req->Geography";
    if($dept_req->Mathmatics>0)
    $req_dept[$index_dept++]="Mathmatics----$dept_req->Mathmatics";
    if($dept_req->Psychology>0)
    $req_dept[$index_dept++]="Psychology----$dept_req->Psychology";


    if($dept_req->ssc_req_with_optional>0)
    $req_dept[$index_dept++]="SSC GPA Must be greater than or  equal $dept_req->ssc_req_with_optional";
         if($dept_req->hsc_req_with_optional>0)
    $req_dept[$index_dept++]="HSC GPA Must be greater than or  equal $dept_req->hsc_req_with_optional";
        if($dept_req->total_req_with_optional>0)
    $req_dept[$index_dept++]="Total SSC & HSC GPA Must be greater than or  equal $dept_req->total_req_with_optional";

  //  foreach ($req as $req) {
  //    echo "$req <br>";
  //  }


return View::make('students.dept_req')->with('req_unit',$req_unit)->with('req_dept',$req_dept)->with('all_sub',$all_sub);
   }

}
