@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">
@endsection


@section('details')

<div class="form-style-2 form">
<h1 style="color:green; font-size : 18px"></h1>
</br>
<form action="/alert" method="post">

	{{ csrf_field() }}
<h1 style="font-size:15px">Select Subscribed University </br></h1>
<select type="text" name="universityId" class="form-group" style="width: 100%;height: 30px;">
	@if(isset($universities))
	@foreach($universities as $university)
	<option value="{{$university->univ_id}}">{{$university->univ_short_name}}</option>
	@endforeach
	@endif
</select>
<h1 style="font-size:15px">Your message </br></h1>
<label for="field1"><span><span class="required"></span></span><textarea name="message" style="width:500px" cols="40" rows="10" class="input-field" maxlength="1000" id="id_product_details" required>
</textarea></label>


<label><span>&nbsp;</span><input type="submit" style="margin-left:-100px" value="Send" /></label>
</form>
</div>
@endsection