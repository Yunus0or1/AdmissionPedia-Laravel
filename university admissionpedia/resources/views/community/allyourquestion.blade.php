@extends('community.base_profile')

@section('css')
<style>


.inline {
  display: inline-block;
  margin: 1em;
}
.wrap {
  display: table;
  width:   500px;
  padding: 10px;
  border:  white;
}
.wrap p {
  display:        table-cell;
  vertical-align: middle;
}

</style>

@endsection




@section('details')

<center>
<hr width="50%" style="background-color:black">
<h1 style="font-size:20px"><b>All Questions asked by self</b></h1>
<hr width="50%" style="background-color:black">
</center>



</br>
<center>
@foreach($allyourquestion as $allyourquestion)
<a href="{{url('/detailsofquestion/'.$allyourquestion->id .'/')}}" style="font-size:15px;margin-bottom:-10px">
Topic : {{$allyourquestion->topic}}</a>
<h1 style="color:black;font-size:15px;margin-bottom:-10px">Posted at : {{$allyourquestion->asked_at}}</h1>
<h1 style="color:black;font-size:15px;margin-bottom:-10px">Total Discussion on this topic : </h1>

<hr style="background-color:black">
@endforeach
</center>

@endsection




















