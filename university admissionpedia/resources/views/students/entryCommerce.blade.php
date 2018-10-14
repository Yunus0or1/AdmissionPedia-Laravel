@extends('addpedia.master')

@section('form')
	<div class="panel panel-default">
		<div class="panel-heading teal">
			<h4>Fill Your Gpa Info</h4>
		</div>
	  <div class="panel-body">
	  	{{ Form::open(['route' => 'gpa.commerce'])}}
			<div class="input-filed col m4">
				{{ Form::label('bangla', 'Bangla') }}
				{{ Form::select('bangla', [
					'' => 'Select GPA',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('english', 'English')}}
				{{ Form::select('english', [
					'' => 'Select GPA',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>



			<div class="input-filed col m4">
				{{ Form::label('accounting', 'Accounting')}}
				{{ Form::select('accounting', [
					'' => 'Select GPA',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>



			<div class="input-filed col m4">
				{{ Form::label('economics', 'Economics')}}
				{{ Form::select('economics', [
					'' => 'Select GPA',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>

				<div class="input-filed col m4">
				{{ Form::label('introduction_to_business', 'Introduction to Business')}}
				{{ Form::select('introduction_to_business', [
					'' => 'Select GPA',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>

				<div class="input-filed col m4">
				{{ Form::label('statistics', 'Statistics')}}
				{{ Form::select('statistics', [
					'' => 'Select GPA',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>

				<div class="input-filed col m4">
				{{ Form::label('business_geography', 'Business Geography')}}
				{{ Form::select('business_geography', [
					'' => 'Select GPA',
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
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

			<div class="input-field">
				{{ Form::submit('Submit', ['class'=>'btn btn-primary right'])}}
			</div>
		{{ Form::close()}}
	  </div>
	</div>
	
@stop