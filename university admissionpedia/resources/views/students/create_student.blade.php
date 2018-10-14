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

@extends('addpedia.master')

@section('form')

<style>

body{
 
  padding: 0;
  margin: 0;	
  background: url("image/sust4.jpg"); no-repeat center center fixed; 
  background-size: cover;
  height: 100%;
  width: 100%;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
}


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





<body>

	<div class="panel panel-default">
		<div class="panel-heading teal">
		<h4>Fill The Info</h4>
		 </div>
		<div class="panel-body">
					
			{{ Form::open(['route'=>'student.store', 'method'=>'post'])}}

                

				<div class="input-field">
					
					<!-- {{ Form::text('blood',null ,array("class"=>"form-control")) }} -->
					{{ Form::select('ssc_year', 
					[
						'' => 'Select SSC Pass Year',
						date('Y') => date('Y')-2,
						date('Y')-1 => date('Y')-3
					], null, array('class' => ''))}}
					
				</div>
				<div class="input-field">
					<!-- {{ Form::text('blood',null ,array("class"=>"form-control")) }} -->
					{{ Form::select('hsc_year', 
					[
						'' => 'Select HSC Pass Year',
						date('Y') => date('Y'),
					
					], null, array('class' => ''))}}
					
				</div>
				
				
				<div class="input-field">
					<!-- {{ Form::text('blood',null ,array("class"=>"form-control")) }} -->
					{{ Form::select('group', [
						'' => 'Select Group',
						'Science' => 'Science',
						'Commerce' => 'Commerce',
						'Humanities' => 'Humanities'
					], null, array('class' => ''))}}
					
				</div>

				<div class="input-field">
					{{ Form::submit('Submit', ['class'=>'btn btn-primary right'])}}
				</div>

			{{ Form::close()}}
		</div>
	</div>
	
</body>	
@stop