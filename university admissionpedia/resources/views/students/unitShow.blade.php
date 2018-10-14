<head>
        <meta charset="utf-8">
        <title></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="{{asset('css/bootsnav.css')}}">
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    
    
		
		<style>
		    
		
		</style>
		
    </head>
<!-- Header -->
        <header>           
           <!-- Navbar -->
            <nav class="navbar bootsnav">
					
					<div class="container">
                    <!-- Navigation -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav menu">
                            <li><a href="{{url('/')}}">Home</a></li>                    
                            <li><a href="{{url('/formfirstpage')}}">Find the best university</a></li>
                            <li><a href="{{url('/login')}}">Community</a></li>
							<li><a href="{{url('/aboutus')}}">About us</a></li>
                        </ul>
                    </div>
                </div>   
            </nav><!-- Navbar end -->
        </header><!-- Header end -->


<style>




.cyan.darken-4 {
    background-color: #006064 !important;
    padding: 10px;
}


nav.bootsnav .container {
    position: relative;
    margin-top: -14px;
}

nav.navbar.bootsnav ul.nav > li > a {
    color: #fff;
    height: 70px;
}

#navbar-menu {
    margin: 6px 0;
    margin-right: -199px;
}


</style>


@extends('addpedia.master')


@section('test')


<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}


tr:hover{background-color:#f5f5f5}


th {
    background-color: #008080;
    color: white;
    font-size: 30px;
}
</style>
</head>
<body>



<!-- <h2>Your GPA fullfills these subject's requirement</h2> -->


	
	
   
   <h1 style="font-size: 25px ; color: Green">{{$university_details[0]->univ_full_name}} </h1>
   
	
<table>
   
   	    
  <tr>
    <th style="font-size: 25px">Unit Name</th>
    <th style="font-size: 25px">Total Seat</th>
	<th style="font-size: 25px">Form Price</th>
	<th style="font-size: 25px">Date of Exam</th>    
    <th style="font-size: 25px">Time of exam</th>

  </tr>
  
  
    
    @foreach($all_unit_details as $unit)
	
    <tr>
	
    <td style="font-size: 18px " >{{ link_to('entrydept/'.$unit->unit_id.'/'.$student_id.'/'.$group,$unit->unit_name) }}</td> 
    <td style="font-size: 18px">{{$unit->total_seat}}</td>
	<td style="font-size: 18px">{{$unit->form_price }} </td> 
	<td style="font-size: 18px">{{$unit->exam_date}}</td>
	<td style="font-size: 18px">{{ $unit->exact_time }}</td>
    </tr>
    @endforeach

</table>





	<div class="Apply">
		<h1 style="font-size: 30px; text-decoration:underline"> Apply System:</h1>
		<p style="font-size= 18px"> You must have to use Teletalk sim card for applying.</p>
		@foreach($all_unit_details as $unit)
		<h1 style="font-size:18px "><B> For applying in {{$unit->unit_name}} unit : {{$unit->system_of_apply}}</B> </br></br></h23>
		 @endforeach
	</div>
	
	
	<div class="prospectus">
	
		<h244 style="font-size: 18px; ""><B>Prospectus: </B>
		<a href="{{$university_details[0]->prospectus_link}}" style ="font-size:18px;"> Click here to download the prospectus of {{$university_details[0]->univ_short_name}} </a></h244>
	
	</div>
	
	<div class="website">
	</br>
	</br>
		<h243 style="font-size: 18px;""><B>Website of {{$university_details[0]->univ_short_name}}: </B>
		<a href="http://{{$university_details[0]->website}}" style ="font-size:18px">  {{$university_details[0]->website}} </a></h243>
	
	</div>
	
	<div class="prospectus_based_on_year">
	</br>
	</br>
		<h243 style="font-size: 18px;""><B>All details based on: </B>
		<h222 href="" style ="font-size:18px">  {{$university_details[0]->prospectus_based_on_year}} prospectus </h222></h243>
	
	</div>
	
<br/>
</body>
@stop

