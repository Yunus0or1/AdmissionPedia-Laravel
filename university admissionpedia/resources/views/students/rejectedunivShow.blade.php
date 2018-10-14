
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
    <h3 style=" text-align: center ;background-color: #2F4F4F;color:white">Admission Exam Requirement</h3>
	


   <table> 
  <tr>
    <th>Exam</th>
    <th>Required GPA</th>
    <th>Your GPA</th>
    <th>Status</th>
  </tr>
  
  
    
  
    
  <tr>
    <td>SSC GPA</td>
    <td>{{$requirement[0]->req_gpa_ssc}}</td>
    <td>{{$result[0]->gpa_ssc}}</td>
	@if( $requirement[0]->req_gpa_ssc <= $result[0]->gpa_ssc)
    <td><i class="fa fa-check" style="color:green; "></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red"; > </td>
    @endif
	
	</tr>
   
   <tr>
    <td>HSC GPA</td>
    <td>{{$requirement[0]->req_gpa_hsc}}</td>
    <td>{{$result[0]->gpa_hsc}}</td>
	@if($requirement[0]->req_gpa_hsc < $result[0]->gpa_hsc)
    <td><i class="fa fa-check" style="color:green; "></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red"; > </td>
    @endif
	
	</tr>
	
	<tr>
    <td>Total GPA</td>
    <td>{{$requirement[0]->req_gpa_total}}</td>
    <td>{{$result[0]->gpa_total}}</td>
	@if($requirement[0]->req_gpa_total < $result[0]->gpa_total)
    <td><i class="fa fa-check" style="color:green; "></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red"; > </td>
    @endif
	
	</tr>
    
</table>



@stop


