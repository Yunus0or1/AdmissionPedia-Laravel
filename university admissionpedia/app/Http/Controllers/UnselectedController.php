<?php

class UnselectedController extends Basecontroller
{
	public function univ($univ_id,$group_id)
	{
	   $result=DB::table('science_student')
             
             ->get();
			 
		$requirement = 	DB::table('universities')
						->where('univ_id','=',$univ_id)
						->get();
 
     return View::make('students.rejectedunitShow')->with('result',$result)->with('requirement',$requirement);
	}


	public function unit_req($univ_id,$unit_id,$group_id)
	{
       $i=0;
       $unit_data=DB::table('units')
                  ->where('units.unit_id','=',$unit_id)
                  ->first();

       $year= DB::table('universities')->where('univ_id', $univ_id)->first();
       $year=$year->year_allowed;
       
       if($univ_id==10 || $univ_id==27 || $univ_id==6 || $univ_id==20 || $univ_id== 7)
       {
          $year=2016;
       }

       $req_unit[$i++]="Only who passed HSC in $year or above can apply";

       if($univ_id==10)
       {
       	$req_unit[$i++]="Average SSC & HSC GPA must be greater than or equal 4";
       	$req_unit[$i++]="Total GPA of English,Physics,Chemistry & Mathmatics in HSC greater than or equal 19";
       }
       
       if($univ_id==27)
       {
       	$req_unit[$i++]="HSC GPA in Mathmatics,Physics & Chemistry must be greater than or equal 4";
       	$req_unit[$i++]="HSC GPA in English must be equal or greater than 3.5";
       	$req_unit[$i++]="Total GPA of English,Physics,Chemistry & Mathmatics in HSC greater than or equal 18.5";
       }

       if($univ_id==6)
       {
       	$req_unit[$i++]="Total GPA of Bangla,English,Physics,Chemistry & Mathmatics in HSC greater than or equal 24";
       }
       
       if($univ_id==20 || $univ_id==7)
       {
       	$req_unit[$i++]="Total GPA of English,Physics,Chemistry & Mathmatics in HSC greater than or equal 19";
       }

     if($unit_data->with_optional=='yes')
    {
      if($unit_data->ssc_req_with_optional!=0) 	
      $req_unit[$i++]="SSC GPA (with optional) must be greater than or equal $unit_data->ssc_req_with_optional";
      if($unit_data->hsc_req_with_optional!=0)
      $req_unit[$i++]="HSC GPA (with optional) must be greater than or equal $unit_data->hsc_req_with_optional";
      if($unit_data->total_req_with_optional!=0)
      $req_unit[$i++]="Total SSC & HSC GPA (with optional) must be equal or greater than $unit_data->total_req_with_optional";
    }
    else
    {
      if($unit_data->ssc_req_without_optional)
      $req_unit[$i++]="SSC GPA(without optional) must be greater than or equal $unit_data->ssc_req_without_optional";
      if($unit_data->ssc_req_without_optional)
      $req_unit[$i++]="HSC GPA(without optional) must be greater than or equal $unit_data->hsc_req_without_optional";
      if($unit_data->total_req_without_optional)
      $req_unit[$i++]="Total GPA(without optional) must be greater than or equal $unit_data->total_req_without_optional";
    }
     
     $req_dept=null;//do not delete;
  //   return View::make('students.dept_req')->with('req_unit',$req_unit);
     return View::make('students.unitreqShow')->with('req_unit',$req_unit)->with('req_dept',$req_dept);

	}
}