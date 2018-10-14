@extends('community.base_profile')


@section('css')
<style>
input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 190px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}


</style>
@endsection




@section('details')






<center style="margin-top:13%">
<div>
<h1>Please select a unit of {{$universitydetails[0]->univ_short_name}} </h1>

  <form action="/editunit" method="post">
  
   <select id="university_unit" name="unit_editing_type">


	  <option value="1">NCTB curriculum</option>
	  <option value="2">English medium</option>


    </select>
	</br>
	
    <select id="university_unit" name="unit_id">
@foreach($unitdetails as $unitdetails)
     <option value="{{$unitdetails->unit_id}}">{{$unitdetails->unit_name}}</option>
@endforeach	
    </select>

	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	</br>
    <input type="submit" value="Edit Unit details" name="unit_editing" value="unit_editing">
	<input type="submit" value="Edit Subject details of this unit" name="subject_editing" value="subject_editing">
  </form>


</div>
			
</center>

@endsection