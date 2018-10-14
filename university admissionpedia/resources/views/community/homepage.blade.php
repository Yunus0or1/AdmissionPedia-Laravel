@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">
@endsection




@section('details')

<center>
<hr width="50%" style="background-color:black">
<h1 style="font-size:20px"><b>All Questions</b></h1>
<hr width="50%" style="background-color:black">
</center>



</br>
<center>
@foreach($questions as $questions)
<a href="{{url('/detailsofquestion/'.$questions->id .'/')}}" style="font-size:15px;margin-bottom:-10px">
Topic : {{$questions->topic}}</a>
<h1 style="color:black;font-size:15px;margin-bottom:-10px">Asked By : {{$questions->user_name}}</h1>
<h1 style="color:black;font-size:15px;margin-bottom:-10px">Asked at : {{$questions->asked_at}}</h1>


<hr style="background-color:black">
@endforeach
</center>

@endsection
