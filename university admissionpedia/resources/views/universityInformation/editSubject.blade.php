@extends('community.base_profile')


@section('css')
<style>

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="{{asset('css/bootsnav.css')}}">
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}" />


</style>
@endsection



@section('details')

<center><h1 style="padding:10px;text-decoration:underline">All subjects of {{$universitydetails[0]->univ_short_name}} : Unit {{$unitdetails[0]->unit_name}}</h1></center>

<center style="margin-top:5%;margin-left:80%;font-size:20px">
  <div >
	{{ link_to('/addsubject'.'/'.$unit_id.'/'.$editing_type_syllabus,'Add new subject') }}
  </div>
 </center>

			
			@foreach($deptdetails as $dept)
			<h23 style="font-size:20px;margin-left:30px;text-allign:centre">
			<div class="" 
				style= "max-width:10%;height:30px;background-color:rgba(255,255,0,255);margin:auto;">
			<div class="card-content" style="">
			<center>{{ link_to('updatedept/'.$dept->dept_id,$dept->dept_name) }}</center>

			</div>
			</div>
			@endforeach

			


  
  </center>
@endsection






















