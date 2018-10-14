@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">
@endsection


@section('details')

<div class="form-style-2">
<h1 style="color:green; font-size : 18px"></h1>
</br>
<form action="{{url('/askquestion')}}" method="post">

	{{ csrf_field() }}
<h1 style="font-size:15px">Heading of your question</br></h1>
<label for="field1"><span><span class="required"></span></span><input type="text" style="width:500px" name="topic" class="input-field" maxlength="30" id="id_product_name_english" required /></label>
<h1 style="font-size:15px">Your question </br></h1>
<label for="field1"><span><span class="required"></span></span><textarea name="question" style="width:500px" cols="40" rows="10" class="input-field" maxlength="1000" id="id_product_details" required>
</textarea></label>


<label><span>&nbsp;</span><input type="submit" style="margin-left:-100px" value="Submit" /></label>
</form>
</div>
@endsection