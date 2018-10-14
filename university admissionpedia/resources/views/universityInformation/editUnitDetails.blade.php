@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">
@endsection




@section('details')
<center><h1 style = "font-size:10px"><b></b></h1></center>
<div class="form-style-2">
<h1 style="color:green; font-size : 18px"></h1>

<form action="{{url('/updateunitdetails')}}" method="post">

	{{ csrf_field() }}
	
<h1 style="margin-bottom:5px"> {{$universitydetails[0]->univ_short_name}}:{{$unitdetails[0]->unit_name}}
	
	
<input name="univ_id" type="hidden" value="{{$universitydetails[0]->univ_id}}">
<input name="unit_belongs_to" type="hidden" value="{{$unitdetails[0]->unit_belongs_to}}">
<input name="unit_id" type="hidden" value="{{$unitdetails[0]->unit_id}}">

<h1 style="font-size:15px">Unit Name</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->unit_name}}" name="unit_name" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Total Seat</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->total_seat}}" name="total_seat" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Exam date</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->exam_date}}" name="exam_date" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Day of exam</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->day}}" name="day" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Exact time of exam</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->exact_time}}" name="exact_time" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">System to apply</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->system_of_apply}}" name="system_of_apply" class="input-field" maxlength="255"  required /></label>


<h1 style="font-size:15px">Form price</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->form_price}}" name="form_price" class="input-field" maxlength="255"  required /></label>


<h1 style="font-size:15px">Required SSC GPA</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_ssc}}" name="req_gpa_ssc" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Required HSC GPA</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_hsc}}" name="req_gpa_hsc" class="input-field" maxlength="255"  required /></label>


<h1 style="font-size:15px">Required Total GPA</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_total}}" name="req_gpa_total" class="input-field" maxlength="255"  required /></label>







@if($unitdetails[0]->unit_belongs_to == 'S')
	
<h1 style="font-size:15px">Required GPA in Math</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_math}}" name="req_gpa_math" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Required GPA in Physics</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_physics}}" name="req_gpa_physics" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Required GPA in Chemestry</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_chem}}" name="req_gpa_chem" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Required GPA in Biology</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_biology}}" name="req_gpa_biology" class="input-field" maxlength="255"  required /></label>

@endif




@if($unitdetails[0]->unit_belongs_to == 'A')


<h1 style="font-size:15px">Required GPA in English</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_english}}" name="req_gpa_english" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Required GPA in Bangla</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_bangla}}" name="req_gpa_bangla" class="input-field" maxlength="255"  required /></label>

@endif







@if($unitdetails[0]->unit_belongs_to == 'C')


<h1 style="font-size:15px">Required GPA in Business Management</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_business_management}}" name="req_gpa_business_management" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Required GPA in Accounting</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_accounting}}" name="req_gpa_accounting" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Required GPA in Finance</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_finance}}" name="req_gpa_finance" class="input-field" maxlength="255"  required /></label>


<h1 style="font-size:15px">Required GPA in Marketing</br></h1>

<label for="field1"><input type="text" style="width:500px" value="{{$unitdetails[0]->req_gpa_marketing}}" name="req_gpa_marketing" class="input-field" maxlength="255"  required /></label>

@endif





<label><span>&nbsp;</span><input type="submit" style="margin-left:-100px" value="Update Unit details" /></label>

</form>



</div>


@endsection































