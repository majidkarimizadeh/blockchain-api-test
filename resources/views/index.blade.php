@extends('master')

@section('content')

	{{-- TODO: Should be in seprate file --}}
	@if($symbol === 'eth')
		<form action="{{ route("{$symbol}.store") }}" method="post" class="mb-5">
			<div class="input-group mb-3">
			  	<input type="text" class="form-control" name="name" placeholder="insert name">
			  	<div class="input-group-append">
			    	<button class="btn btn-outline-secondary" type="submit">Create</button>
			  	</div>
			  	@csrf
			</div>
		</form>
		@if(isset($newAddress))
			<div class="my-5">
				Created address <code>{{ $newAddress }}</code>
			</div>
		@endif
	@endif

	<table class="table">
		<thead>
		    <tr>
		      <th scope="col">Addresses</th>
		      <th scope="col">Action</th>
		    </tr>
		</thead>
	  	<tbody>
			@foreach($addresses as $address)
		    	<tr>
		    		<th>{{ $address }}</th>
	      			<td><a href="{{ route("{$symbol}.show", ['address' => $address]) }}">View Balance</a></td>
	    		</tr>
			@endforeach
  		</tbody>
	</table>

@endsection