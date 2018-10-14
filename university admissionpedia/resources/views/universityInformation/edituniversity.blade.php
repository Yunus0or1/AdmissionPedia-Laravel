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
    width: 150px;
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
<h1>Please select a university </h1>

  <form action="/edituniversity" method="post">
  
    <select id="university" name="univ_id">
@foreach($universitylist as $universitylist)
      <option value="{{$universitylist->univ_id}}">{{$universitylist->univ_full_name}}</option>
@endforeach	
    </select>

	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
	</br>
    <input type="submit" value="Edit university details" name="university_editing" value="university_editing">
	<input type="submit" value="Edit unit details" name="unit_editing" value="unit_editing">
  </form>


</div>
			
</center>

@endsection