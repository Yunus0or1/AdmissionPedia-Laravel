@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">
@endsection




@section('details')
<center><h1 style = "font-size:10px"><b>{{$message}}</b></h1></center>
<div class="form-style-2">
<h1 style="color:green; font-size : 18px"></h1>

<form action="{{url('/adduniversity')}}" method="post">

	{{ csrf_field() }}
<h1 style="font-size:15px">Full name of University</br></h1>
<label for="field1"><input type="text" style="width:500px" name="univ_full_name" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Short name of University</br></h1>
<label for="field1"><input type="text" style="width:500px" name="univ_short_name" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Number of units</br></h1>
<label for="field1"><input type="text" style="width:500px" name="univ_unit_number" class="input-field" maxlength="255" required /></label>


<h1 style="font-size:15px">Unit Description</br></h1>
<label for="field1"><input type="text" style="width:500px" name="univ_unit_desc" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Total seat</br></h1>
<label for="field1"><input type="text" style="width:500px" name="total_seat" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Apply start date (Insert as date : 2017-07-31)</br></h1>
<label for="field1"><input type="text" style="width:500px" name="apply_start" class="input-field" maxlength="255" required /></label>


<h1 style="font-size:15px">Apply off date (Insert as date : 2017-07-31)</br></h1>
<label for="field1"><input type="text" style="width:500px" name="apply_off" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Required SSC GPA to apply </br></h1>
<label for="field1"><input type="text" style="width:500px" name="req_gpa_ssc" class="input-field" maxlength="255" required /></label>


<h1 style="font-size:15px">Required HSC GPA to apply </br></h1>
<label for="field1"><input type="text" style="width:500px" name="req_gpa_hsc" class="input-field" maxlength="255" required /></label>


<h1 style="font-size:15px">Required total GPA(HSC+SSC) to apply </br></h1>
<label for="field1"><input type="text" style="width:500px" name="req_gpa_total" class="input-field" maxlength="255" required /></label>


<h1 style="font-size:15px">Required GPA of (Phy+Chem+Bang+Eng+Math) to apply </br></h1>
<label for="field1"><input type="text" style="width:500px" name="req_gpa_pcmeb" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Second timer allowed or not (y/n) </br></h1>
<label for="field1"><input type="text" style="width:500px" name="allow_second_timer" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Mark deduction based on GPA</br></h1>
<label for="field1"><input type="text" style="width:500px" name="deduction" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Prospectus based on session</br></h1>
<label for="field1"><input type="text" style="width:500px" name="prospectus_based_on_year" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">Prospectus link</br></h1>
<label for="field1"><input type="text" style="width:500px" name="prospectus_link" class="input-field" maxlength="255" required /></label>

<h1 style="font-size:15px">University website link</h1>
<label for="field1"><input type="text" style="width:500px" name="website" class="input-field" maxlength="255" required /></label>


<h1 style="font-size:15px">SAT score (For foreigners)</h1>
<label for="field1"><input type="text" style="width:500px" name="gre_score" class="input-field" maxlength="255" /></label>

<label><span>&nbsp;</span><input type="submit" style="margin-left:-100px" value="Submit" /></label>

</form>



</div>


@endsection































