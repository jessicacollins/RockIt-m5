@extends('layout')

@section('main_content')
This is all items


<table border=1 >
	<tr>
		<td>Name</td>
		<td>Price</td>
	</tr>
		@foreach ($items as $item)
	    	<tr>
	    		<td>{{$items->name}}</td>
	    		<td>{{$items->price}}</td>
	    	</tr>
		@endforeach
</table>

@endsection