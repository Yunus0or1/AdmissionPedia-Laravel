<!DOCTYPE html>

<html lang="en">
	<head>
	
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title></title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="{{asset('css/dashboard/bootstrap.min.css')}}"/>
		
		 <!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="{{asset('css/dashboard/style.css')}}"/>
		
		<link href="{{asset('css/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">

		<link href="{{asset('css/dashboard/css/style.css')}}" rel="stylesheet">  

		<link href="{{asset('css/dashboard/css/colors/blue.css')}}" id="theme" rel="stylesheet">
		
		@yield('css')

		
	</head>


<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container" style = "width: 1400px">
				
						@if(Sentinel::check())
			
						<form action="/logout" method="POST" id="logout-form">
						{{csrf_field()}}
			
						<ul class="header-links pull-left" style="margin-left:5px">
						<li>
						<a href="#" onclick ="document.getElementById('logout-form').submit()"> 
						Logout 
						</a>
						</li>
						</ul>
			
						</form>
						@else
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> Sign in</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> Sign up</a></li>

					</ul>
						@endif
					<ul class="header-links pull-right">
						
		                    <li><a href="{{url('/')}}">Home</a></li>                    
                            <li><a href="{{url('/formfirstpage')}}">Find the best university</a></li>

					</ul>
				</div>
			</div>
		</header>

<div class="fix-header card-no-border">

    <div id="main-wrapper">



        <aside class="left-sidebar" style = "margin-top : 50px; height:100%;>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
				
                    <ul id="sidebarnav">
                        <li>
                            <a href="{{url('/community')}}" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                        </li>
						
                        <li>
                            <a href="{{url('/profile')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profile</a>
                        </li>
						
					    <li>
                            <a href="{{url('/askquestion')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Ask a question</a>
                        </li>
						
                        <li>
                            <a href="{{url('/allyourquestions')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>All your questions</a>
                        </li>
						
                        <li>
                            <a href="{{url('/subscription')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Subscribe</a>
                        </li>                  
					
					@if(Sentinel::getUser()->type == 'moderator' or Sentinel::getUser()->type == 'admin')
                        <li>
                            <a href="{{url('/adduniversity')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Add University</a>
                        </li>
						
					     <li>
                            <a href="{{url('/edituniversity')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Edit University details</a>
                        </li>
						
					     <li>
                            <a href="{{url('/alert')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Send Awarness</a>
                        </li>
						
					     <li>
                            <a href="{{url('/breakingNews')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Send breaking news</a>
                        </li>

					@endif
						
					@if (Sentinel::getUser()->type == 'admin' )
						<li>
                            <a href="{{url('/addmember')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Add New Member</a>
                        </li>
					@endif
					
					</ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

	</div>
		
</div>

						@yield('details')

						         


						@yield('js')


	
	
</body>	
	
	
	
	
	
	
	
	
	
	
	
	
