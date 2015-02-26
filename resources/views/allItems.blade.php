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
	    		<td>{{$item->name}}</td>
	    		<td>{{$item->price}}</td>
	    	</tr>
		@endforeach
</table>

@endsection