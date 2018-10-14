@extends('community.base_profile')

@section('css')
<style>

.inline {
  display: inline-block;
  margin: 1em;
}
.wrap {
  display: table;
  width:   250px;
  padding: 10px;
  border-style: solid;
  border-color: white;
  
}


</style>

@endsection




@section('details')

<center style="margin-left:0px">
</br>
</br>

<div class="inline">
  <div class="wrap" style="text-align: right;width:500px">

 
 @foreach($unsubscripted as $unsubscribe)
<h1 style="color:black;font-size:15px;margin-bottom:-10px">{{$unsubscribe->univ_full_name}} &nbsp :  
<a href="/subscription/add/{{$user_id}}/{{ $unsubscribe->univ_id }}">Subscribe</a></h1>
 @endforeach
 
 
 
 
 
  @foreach($subscripted as $subscribe)
<h1 style="color:black;font-size:15px;margin-bottom:-10px">{{$subscribe->univ_full_name}} &nbsp :
<a href="/subscription/delete/{{$user_id}}/{{ $subscribe->univ_id }}">UnSubscribe</a></h1>
 @endforeach
	</div>
</div>



<hr style="background-color:red">

</center>

@endsection



@section('js')


@endsection
















