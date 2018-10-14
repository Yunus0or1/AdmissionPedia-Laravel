@extends('addpedia.master')

@section('test')
   <h2>Criteria To Apply</h2>
	@foreach($req_unit as $req_unit)
	<ul class="list-style-type:square">
		<li class="list-group-item list-group-item-success">
		    <h5>{{$req_unit}}</h5>
		</li>
	</ul>
	@endforeach
@stop