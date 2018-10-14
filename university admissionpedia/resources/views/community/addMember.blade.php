@extends('community.base_profile')


@section('css')


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
@endsection


@section('details')

<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<div class="wrap-contact100">

				<span class="contact100-form-title">
					Add new member
				</span>
				
			{{ Form::open(['route' => 'registerNewMember', 'files' => true]) }}
			

			
				<div class="wrap-input100 validate-input" data-validate="Name is required">
				{{ Form::text('full_name',Input::old('username'),array('placeholder'=>'Full name','class' =>'input100')) }}
					<span class="focus-input100-1"></span>
					<span class="focus-input100-2"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
				{{ Form::text('user_name',null,array('placeholder'=>'User name','class' =>'input100')) }}
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
				
				<div class="" data-validate="Name is required">
				<h1> Select member type </h1>
				{{ Form::select('type', [
					'admin' => 'Admin',
					'moderator' => 'Moderator',
					'normaluser' => 'Normaluser',

				], null, array('class' => 'wrap-input100 validate-input'))}}

				</div>
				

				
				
			    <h1 style="font-size:20px">Profile picture</h1>
				</br>
				<input type="file" name="filea" placeholder="aa" enctype="multipart/form-data" required >
				
			<div class="container-contact100-form-btn">
				{{ Form::submit('Submit', ['class'=>'contact100-form-btn'])}}
			</div>
	
				
				
				
			  {{ Form::close()}}

		</div>
		
		
	</div>
@endsection