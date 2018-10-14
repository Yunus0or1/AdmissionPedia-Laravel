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


	
	
   
   <h1 style="font-size: 25px ; color: Green">{{$university_details[0]->univ_full_name}} : {{$unit_details[0]->unit_name}} </h1>
   
	
<table>
   
   	    
  <tr>
    <th style="width:50%">Department Name</th>
    <th style="width:50%">Total Seat</th>
  </tr>
  
  
    
    @foreach($eligible_dept_details as $dept)
	
    <tr>
	
    <td style="font-size: 18px " >{{$dept->dept_name}}</td> 
    <td style="font-size: 18px">{{$dept->total_seat}}</td>

    </tr>
    @endforeach

</table>


	
<br/>
</body>
@stop