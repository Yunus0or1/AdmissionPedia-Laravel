<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('css/registration/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/registration/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/registration/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="{{asset('css/registration/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/registration/css/main.css')}}">
<!--===============================================================================================-->
</head>

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

</style>

<body>


	<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<div class="wrap-contact100">

				<span class="contact100-form-title">
					Sign up here
				</span>
				
			{{ Form::open(['route' => 'registrationcomplete', 'files' => true]) }}
			

			
				<div class="wrap-input100 validate-input" data-validate="Name is required">
				{{ Form::text('full_name',Input::old('username'),array('placeholder'=>'Your full name','class' =>'input100')) }}
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
				{{ Form::text('user_name',null,array('placeholder'=>'Your user name','class' =>'input100')) }}
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
				{{ Form::email('email',null,array('placeholder'=>'Email address','class' =>'input100')) }}
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
				{{ Form::password('password',array('placeholder'=>'Password','class' =>'input100')) }}
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>
				
				
			    <h1 style="font-size:20px">Your profile picture</h1>
				</br>
				<input type="file" name="filea" placeholder="aa" enctype="multipart/form-data" required >
				
			<div class="container-contact100-form-btn">
				{{ Form::submit('Submit', ['class'=>'contact100-form-btn'])}}
			</div>
	
				
				
				
			  {{ Form::close()}}
			  </br>
		<h1 style="font-size:10px;color:green">Already Registered ? <a href="{{url('/login')}}">Login Here</a></h1>
		
		<h1 style="font-size:10px;color:red"> <a href="{{url('/')}}">Back to Homepage</a></h1>
		</div>
		
		
	</div>






</body>
</html>
