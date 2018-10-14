<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="{{asset('css/bootsnav.css')}}">
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
		<link rel="stylesheet" href="{{asset('css/firstpage.css')}}" />
		
		
	</head>	
		
<body>		

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
							<li><a href="http://118.179.70.235:28960/">About us</a></li>
                        </ul>
                    </div>
                </div>   
            </nav><!-- Navbar end -->
        </header><!-- Header end -->
		
		
<center><h1 style = "font-size:10px"><b></b></h1>
<div class="form-style-2">
<h1 style="color:green; font-size : 18px"></h1>

<form action="{{url('/gre_score')}}" method="post">

	{{ csrf_field() }}
	
<h1 style="margin-bottom:5px"> </h1>
	

<h1 style="font-size:15px">Enter your SAT score</br></h1>

<label for="field1"><input type="text" style="width:500px" value="" name="gre_score" class="input-field" maxlength="255"  required /></label>



<label><span>&nbsp;</span><input type="submit" style="margin-left:" value="Search university" /></label>

</form>

</center>

</div>

</body>









