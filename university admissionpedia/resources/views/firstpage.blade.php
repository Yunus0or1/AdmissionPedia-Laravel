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
		
	<style>

body {
	
	
  background: no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  -webkit-transition: background-image 1s ease-in-out;
  -moz-transition:background-image 1s ease-in-out;
  transition: background-image 1s ease-in-out;
  
  
  }

	</style>
		
    </head>
	
    <body>

        

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
	
	@if($news != '[]')
    <h4 style="color:red;"><marquee><a href="" style="color:red"
	> {{$news[0]->headline}}</a></marquee> </h4>
	@endif

<center>	
	<div style="border:5px solid black; border-color:rgba(0, 0, 0, 0.1); width:80%; height:250px; font-size:15px; 
position:relative; margin-top:13%;background-color: rgba(0, 0, 0, 0.5); color:white">

<center><h1 style="font-size:35px;margin-left:5px;color:white">Welcome to AdmissionPedia</h1></center>
<p style="font-size:18px;">AdmissionPedia is a website that is corely built to help the students who are forwarding for university admission exams.Admission examinee students now do not have to worry about any university's prospectus. They can easily find out their eligible and desired universities based on their GPA. This website also creates a community not only for admission examinees but for all sort of students to share their knowledge and help others. Any student can ask any kind of study related questions and they might get the answer from thousands of experts. So NO MORE FANCY stuffs. Let's visit the website.</p>	
	</div>
</center>   


</body>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

$(document).ready(function(){
var header = $('body');

var backgrounds = new Array(
    'url(https://user-images.githubusercontent.com/11329052/46916486-3fce3200-cfdd-11e8-8266-1e05ff87708b.jpg)',	
	'url(https://user-images.githubusercontent.com/11329052/46916488-4066c880-cfdd-11e8-92b1-40c8f84a4b91.jpg)',
	'url(https://user-images.githubusercontent.com/11329052/46916489-40ff5f00-cfdd-11e8-98b4-c834b50803e5.jpg)',
	'url(https://user-images.githubusercontent.com/11329052/46916490-40ff5f00-cfdd-11e8-9ffa-f05eb478256b.jpg)',
);

var current = 0;

function nextBackground() {
    current++;
    current = current % backgrounds.length;
	
    header.css('background-image', backgrounds[current]);
}
setInterval(nextBackground, 10000);

header.css('background-image', backgrounds[0]);
});
</script>
</html>
