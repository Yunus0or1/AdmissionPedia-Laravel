<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="{{asset('css/bootsnav.css')}}">
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    </head>
    
		
		<style>
		    
			body{
 
  padding: 0;
  margin: 0;	
  background: url("image/book.jpg"); no-repeat center center fixed; 
  background-size: cover;
  height: 100%;
  width: 100%;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
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

        <section id="a" class="a">
            <!-- Carousel -->
            <div id="a" class="a" data-ride="a">
                <!-- Carousel-inner -->
                <div class="a" role="a">
                    <div class="item active">
                        
                        <div class="a">
                            <div class="a">
							</br>
                                <h3 style="color:white"><center>Well we are here to guide you to find the best universities in your requirement.</center></h3></br>
                                <h1 style="color:white"><center>But,</center></h1></br>
                                <h1 class="" style="color:white"><center>First tell us you are</center> </h1>        </br> </br> </br>                       
                                <div class="buttong" style="margin-left:30%">
								<a  href="{{url('/input')}}" style="color:white" class="btn know_btn" id="ab">HSC Examinee</a>
                                <a  class="btn know_btn" >A-Level Examinee</a>
								<a  href="{{url('/gre_score')}}" style="color:white" class="btn know_btn" id="ab">A Foreigner</a>
								</div>
                            </div>					
                        </div>
                    </div>
                   



                

        </section>



    </body>	
</html>	