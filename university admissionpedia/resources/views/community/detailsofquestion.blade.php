@extends('community.base_profile')


@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard/styleInputFileld.css')}}">

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

<center style="margin-left:-100px">
@foreach($question_details as $questions)

<div class="inline">
  <div class="wrap">
<h1 style="color:black;font-size:13px;margin-bottom:-10px">
    Topic : {{$questions->topic}}</h1>
<h1 style="color:black;font-size:13px;margin-bottom:-10px">Asked By : {{$questions->user_name}}</h1>
<h1 style="color:black;font-size:13px;margin-bottom:-10px">Asked at : {{$questions->asked_at}}</h1>
<h1 style="color:black;font-size:15px;color:green"><b>Question:</b> </h1>

<h1 style="color:black;font-size:18px">{{$questions->question}}</h1>

</div>
</div>

<hr style="background-color:red">
@endforeach
</center>


@if($question_reply->count() > 0)
<center>
<h1 style="color:black;font-size:13px"><b>All replies:</b> </h1>
<hr style="background-color:red">
</center>
@endif
<center style="margin-left:-100px">
@foreach($question_reply as $question_reply)

<div class="inline">
  <div class="wrap">
<h1 style="color:black;font-size:13px;margin-bottom:-10px">Replied By : {{$question_reply->commenter_name}}</h1>
<h1 style="color:black;font-size:13px;margin-bottom:-10px">Replied At : {{$question_reply->commented_at}}</h1>
<h1 style="color:black;font-size:15px;color:green"><b>Answer:</b> </h1>

<h1 style="color:black;font-size:18px">{{$question_reply->reply}}</h1>

</div>
</div>

<hr style="background-color:black">
@endforeach
</center>

<center style="margin-left:-500px">
<div class="form-style-2">
<h1 style="color:black;font-size:15px;margin-left:-380px"><b>Your answer:</b> </h1>
<form action="{{url('/reply')}}" method="post">

	{{ csrf_field() }}
	
<label for="field1"><textarea name="replyquestion" cols="100" rows="10" class="input-field" maxlength="1000" id="id_product_details" required>
</textarea></label>

<input type="hidden" name="questionid" value="{{$question_details[0]->id}}">

<input type="submit"  value="Submit" style="margin-left:-400px">
</form>
</div>
</center>




@endsection




























