@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">
@endsection


@section('details')

<div class="form-style-2">
<h1 style="color:green; font-size : 18px"></h1>
</br>
<form action="{{url('/breakingNews')}}" method="post">

	{{ csrf_field() }}
<h1 style="font-size:15px">Breaking news</br></h1>
<label for="field1"><span><span class="required"></span></span><input type="text" style="width:500px" name="breaking_news" class="input-field" maxlength="30"  required /></label>



<label><span>&nbsp;</span><input type="submit" style="margin-left:-100px" value="Submit" /></label>


</form>

<form action="{{url('/removenews')}}" method="get">
<label><span>&nbsp;</span><input type="submit" style="margin-left:-100px" value="Remove previous news" /></label>
</form>
</div>
@endsection