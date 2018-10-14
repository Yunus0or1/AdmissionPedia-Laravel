@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">
@endsection




@section('details')
<center><h1 style = "font-size:10px"><b></b></h1></center>
<div class="form-style-2">
<h1 style="color:green; font-size : 18px"></h1>

<form action="{{url('/addsubject')}}" method="post">

	{{ csrf_field() }}
	
<h1 style="margin-bottom:5px"> {{$universitydetails[0]->univ_short_name}}:{{$unitdetails[0]->unit_name}}
	
	
<input name="univ_id" type="hidden" value="{{$universitydetails[0]->univ_id}}">
<input name="unit_belongs_to" type="hidden" value="{{$unitdetails[0]->unit_belongs_to}}">
<input name="unit_id" type="hidden" value="{{$unitdetails[0]->unit_id}}">

<h1 style="font-size:15px">Department name</br></h1>

<label for="field1"><input type="text" style="width:500px" value="" name="dept_name" class="input-field" maxlength="255"  required /></label>

<h1 style="font-size:15px">Total Seat</br></h1>

<label for="field1"><input type="text" style="width:500px" value="" name="total_seat" class="input-field" maxlength="255"  required /></label>




<label><span>&nbsp;</span><input type="submit" style="margin-left:-100px" value="Add subject" /></label>

</form>



</div>


@endsection































