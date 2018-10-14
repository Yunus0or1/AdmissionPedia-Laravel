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

h33 {
    font-size: 14px;
    line-height: 110%;
    color: red;
}
</style>


		

@extends('addpedia.master')


@section('form')



			
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif



@if($hsc_year - $ssc_year > 2)
<div class="a">
				<h33 >Are you a second timer ? </h33>
				{{ Form::select('secondtimer', [
					'yes' => 'Yes'	,
									
					'no' => 'No',
						
				], null, array('class' => ''))}}
			</div>

@endif
	<div class="panel panel-default">
		<div class="panel-heading teal">
			<h4>Fill Your HSC Gpa Info</h4>
		</div>

	  <div class="panel-body">
	  	{{ Form::open(['route' => 'gpa.science'])}}
			<div class="input-filed col m4">
				{{ Form::label('ban', 'Bangla') }}
				{{ Form::select('ban', [
					'' =>'Select GPA (Mandatory)',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
				
				
			</div>
			<div class="input-filed col m4">
				{{ Form::label('eng', 'English')}}
				{{ Form::select('eng', [
					'' =>'Select GPA (Mandatory)',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('phy', 'Physics')}}
				{{ Form::select('phy', [
					'' =>'Select GPA (Mandatory)',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('chem', 'Chemistry')}}
				{{ Form::select('chem', [
					'' =>'Select GPA (Mandatory)',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>
			
			
			<div class="input-filed col m6s">
				{{ Form::label('ict', 'Information and Communication Technology')}}
				{{ Form::select('ict', [
					'' =>'Select GPA (Mandatory)',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}

			</div>
		
			<div class="input-filed col m4">
				{{ Form::label('math', 'Higher Mathematics')}}
				{{ Form::select('math', [
					'not taken' => 'Not Taken (Optional)'	,
									
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'F' => 'F'	
				], null, array('class' => ''))}}
			</div>

			
		<div class="input-filed col m4">
				{{ Form::label('bio', 'Biology')}}
				{{ Form::select('bio', [
					'not taken' => 'Not Taken (Optional)'	,
									
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'F' => 'F'	
				], null, array('class' => ''))}}
			</div>
			
			
			
			<div class="input-filed col m4">
				{{ Form::label('agri', 'Agriculture')}}
				{{ Form::select('agri', [
					'not taken' => 'Not Taken (Optional)'	,
									
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'F' => 'F'	
				], null, array('class' => ''))}}
			</div>
            



			

			
			<div class="input-filed col m4">
				{{ Form::label('stat', 'Statistics')}}
				{{ Form::select('stat', [
					
					'not taken' => 'Not Taken (Optional)'	,
									
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'F' => 'F'	
					
				], null, array('class' => ''))}}
			</div>
			
			
			<div class="input-filed col m4">
				{{ Form::label('optional', 'Your optional Subject')}}
				{{ Form::select('optional', [
						'' => 'Choose Subject',
						'bioe'  => 'Biology',
						'mathe' => 'Higher Mathematics',
						'state' => 'Statistics',
						'agrie' => 'Agriculture'
					
				], null, array('class' => ''))}}
			</div>

            </div>
			<div class="input-field col m6">
				{{ Form::label('ssc_gpa', 'SSC GPA')}}
				{{ Form::text('ssc_gpa',null, ['class' => ''])}}
				{{ $errors->first('ssc_gpa')}}
			</div>

             
			

			<div class="input-field col m6">
			{{ Form::hidden('ssc_year',$ssc_year) }}
			</div>
			
			<div class="input-field col m6">
			{{ Form::hidden('hsc_year',$hsc_year) }}
			</div>
			
			<div class="input-filed">
				{{ Form::submit('Submit', ['class'=>'btn btn-primary right'])}}
			</div>

		{{ Form::close()}}
	  </div>
	</div>

	
@stop