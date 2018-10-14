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
                            <li> <a href="{{url('/university')}}">Universities</a></li>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

   <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size: 20px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #2F4F4F;
    color: white;
}

    body
    {
          h3 {
    background-color: #00ff00;
    } 
    }
    </style>
    </head>
     
     
	 

    <body>
	 <h33 style="color:red;font-size:30px ">Oops!! Looks like you were eligible but the apply date is passed.</h33>
    <h3 style=" text-align: center ;background-color: #2F4F4F;color:white">Admission Exam Requirement</h3>
	
	
	<?php
	
	$x = $requirement[0]->req_ssc_gpa - $result[0]->ssc_gpa ;
	$y = $requirement[0]->req_hsc_gpa - $result[0]->hsc_gpa;
	$z = $requirement[0]->req_total_gpa - $result[0]->total_gpa;
	?>

   <table> 
  <tr>
    <th>Exam</th>
    <th>Required GPA</th>
    <th>Your GPA</th>
    <th>Status</th>
  </tr>
  
  
    
  
    
  <tr>
    <td>SSC GPA(with optional)</td>
    <td>{{$requirement[0]->req_ssc_gpa}}</td>
    <td>{{$result[0]->ssc_gpa}}</td>
	@if($x<=0)
    <td><i class="fa fa-check" style="color:green; "></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red"; > </td>
    @endif
	
	</tr>
   
   <tr>
    <td>HSC GPA(with optional)</td>
    <td>{{$requirement[0]->req_hsc_gpa}}</td>
    <td>{{$result[0]->hsc_gpa}}</td>
	@if($y<=0)
    <td><i class="fa fa-check" style="color:green; "></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red"; > </td>
    @endif
	
	</tr>
	
	<tr>
    <td>Total GPA</td>
    <td>{{$requirement[0]->req_total_gpa}}</td>
    <td>{{$result[0]->total_gpa}}</td>
	@if($z<=0)
    <td><i class="fa fa-check" style="color:green; "></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red"; > </td>
    @endif
	
	</tr>
    
</table>


			
@stop


