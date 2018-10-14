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


        
</br>
		<h22 style="font-size:20px; color:Green" > <center><I><B>{{$details[0]->full_name}}</B></I></center> </h22>
      </br>
	  </br>
      <section id="home" class="home">
            <!-- Carousel -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel-inner -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('bootstrap/imagefordetails/'.$details[0]->image1)}}" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
							</br>
							</br>
							</br>
							</br>
							</br>
							</br>
                                <h3>{{$details[0]->full_name}}</h3>
                              
                            </div>					
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('bootstrap/imagefordetails/'.$details[0]->image2)}}" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
							</br>
							</br>
							</br>
							</br>
							</br>
							</br>
                                <h3>{{$details[0]->full_name}}</h3>
                               
                            </div>					
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('bootstrap/imagefordetails/'.$details[0]->image3)}}" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
							</br>
							</br>
							</br>
							</br>
							</br>
							</br>
                                <h3>{{$details[0]->full_name}}</h3>
                                
                            </div>					
                        </div>
                    </div>
                </div><!-- Carousel-inner end -->
                   



                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- Carousel end-->

        </section>
		
		
		
		<div class = "box" style="max-width:50%;height:200px;background-color:white;
	border:50px;
	padding:20px;margin:10px;margin-left: 0px;">
		
	      <h6> {{{ $details[0]->part1 }}}</h6>
		  
	      
	    </div>	  
		
		
		<div class = "box" style="max-width:50%;height:200px;background-color:white;
	border:50px;
	padding:20px;margin:10px;margin-left: 0px; float:right">
	
	      <h6> {{{ $details[0]->part2 }}}</h6>
		  
	      
	    </div>	
		
		
		<div class = "box" style="max-width:50%;height:200px;background-color:white;
	border:50px;
	padding:20px;margin:10px;margin-left: 0px; float:right">
	
	      <h6> {{{ $details[0]->part3 }}}</h6>
		  
	      
	    </div>	
		
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		
		<div class = "box" style="max-width:50%;height:200px;background-color:white;
	border:50px;
	padding:20px;margin:10px;margin-left: 0px; ">
	
	      <h6> Website:&nbsp <a href="http://{{$details[0]->website}}">{{ $details[0]->website}}</a></h6>
		  
	      
	    </div>
				

        <!-- JavaScript -->
        <script src="{{asset('bootstrap/secondpage/js/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/secondpage/js/bootstrap.min.js')}}"></script>

        <!-- Bootsnav js -->
        <script src="{{asset('bootstrap/secondpage/js/bootsnav.js')}}"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{asset('bootstrap/secondpage/js/isotope.js')}}"></script>
        <script src="{{asset('bootstrap/secondpage/js/isotope-active.js')}}"></script>
        <script src="{{asset('bootstrap/secondpage/js/jquery.fancybox.js')}}"></script>

        <script src="{{asset('bootstrap/secondpage/js/jquery.scrollUp.min.js')}}"></script>

        <script src="{{asset('bootstrap/secondpage/js/main.js')}}"></script>
    </body>	
</html>	