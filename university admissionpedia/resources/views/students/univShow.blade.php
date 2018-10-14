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

@section('varsity')

<!-- [] means null  -->			
	
	@if($eligible_university != '[]')	
		<div class="panel-heading teal"><h4> Eligible University</h4></div>
		
		</br>	
		@foreach($eligible_university as $univ)
		
		<div class="card col-md-6 hoverable" 
		style= "max-width:50%;height:220px;background-color:white;margin:auto">
			<div class="card-content">
			
			<h23 style="font-size:20px;margin-left:30px;text-allign:centre">
			<center>{{ link_to('entry/'.$univ->univ_id.'/'.$student_id.'/'.$group,$univ->univ_full_name) }}</center>
		
			<center>
				<br><h6>Seat: {{{ $univ->total_seat }}}</h6>
				<h6>Apply Starts:  {{{ $univ->apply_start }}}</h6>
				<h6>Apply Ends: {{ $univ->apply_off }}</h6>
			</div>
			</center>
		</div>	

	  
		@endforeach
	@endif	
	
@stop
	
	
@section('out_of_date')	

	@if($apply_out_of_date_university != '[]')	
		<div class="panel-heading teal"><h4> Eligible University</h4></div>
		
		</br>	
		@foreach($apply_out_of_date_university as $univ)
		
		<div class="card col-md-6 hoverable" 
		style= "max-width:50%;height:220px;background-color:white;margin:auto">
			<div class="card-content">
			
			<h23 style="font-size:20px;margin-left:30px;text-allign:centre">
			<center>{{ link_to('entry/'.$univ->univ_id.'/'.$student_id.'/'.$group .'/',$univ->univ_full_name) }}</center>
		
			<center>
				<br><h6>Seat: {{{ $univ->total_seat }}}</h6>
				<h6>Apply Starts:  {{{ $univ->apply_start }}}</h6>
				<h6>Apply Ends: {{ $univ->apply_off }}</h6>
			</div>
			</center>
		</div>	

	  
		@endforeach
	@endif	
@stop





@section('non_selected_varsity')	
	
	@if($uneligible_university != '[]')	
		<div class="panel-heading teal"><h4> Not eligible University</h4></div>
		
		</br>	
		@foreach($uneligible_university as $univ)
		
		<div class="card col-md-6 hoverable" 
		style= "max-width:50%;height:220px;background-color:white;margin:auto">
			<div class="card-content">
			
			<h23 style="font-size:20px;margin-left:30px;text-allign:centre">
			<center>{{ link_to('rejected/'.$univ->univ_id.'/'.$student_id ,$univ->univ_full_name) }}</center>
		
			<center>
				<br><h6>Seat: {{{ $univ->total_seat }}}</h6>
				<h6>Apply Starts:  {{{ $univ->apply_start }}}</h6>
				<h6>Apply Ends: {{ $univ->apply_off }}</h6>
			</div>
			</center>
		</div>	

	  
		@endforeach
	@endif	

@stop










