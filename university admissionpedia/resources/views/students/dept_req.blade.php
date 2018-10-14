
<head>
        <meta charset="utf-8">
        <title>Construction - Free HTML Bootstrap Template</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="{{asset('bootstrap/secondpage/custom-font/fonts.css')}}" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('bootstrap/secondpage/css/bootstrap.min.css')}}" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('bootstrap/secondpage/css/font-awesome.min.css')}}" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="{{asset('bootstrap/secondpage/css/bootsnav.css')}}">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/secondpage/css/jquery.fancybox.css')}}" media="screen" />	
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="{{asset('bootstrap/secondpage/css/custom.css')}}" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		
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
</head>

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
    
     

     <br/>

    @if($req_dept!=null)
    <p>
    <h3 style=" text-align: center;background-color: #2F4F4F;color:white">Subject Requirement</h3>
    </p>
    <br/>

    @if($all_sub=='yes')
    <h3 style=" text-align: center;background-color: #2F4F4F;color:white;font-size:30px" >GPA must greater than or equal in below subjects and exams</h3>
    @else
    <h3 style=" text-align: center;background-color: #2F4F4F;color:white;font-size:30px">GPA must greater than or equal gpa in below subjects and exams</h3>
    @endif
    

     <table> 
  <tr>
    <th>Subject / Exam</th>
    <th>Required GPA</th>
    <th>Your GPA</th>
    <th>Status</th>
  </tr>


   
    @for($i=0;$i<sizeof($req_dept);$i++)
    <tr>
    <td>{{$req_dept[$i]}}</td>
    <td>{{$req_dept_gpa[$i]}}</td>
    <td>{{$user_dept_gpa[$i]}}</td>
    @if($user_dept_gpa[$i]>=$req_dept_gpa[$i])
    <td><i class="fa fa-check" style="color:green;"></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red;"></i></td>
    @endif
    </tr>
    @endfor
    
</table>




    @endif
 </body>

@stop