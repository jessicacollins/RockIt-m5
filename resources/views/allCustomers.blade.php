@extends('layout')

@section('main_content')
This is all customers

<table border=1 >
	<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Gender</td>
		<td>Customer Since</td>
		<td>Edit Customer</td>
		<td>Add Invoice</td>
	</tr>
		@foreach ($customer as $customer)
	    	<tr>
	    		<td>{{$customer->first_name}}</td>
	    		<td>{{$customer->last_name}}</td>
	    		<td>{{$customer->email}}</td>
	    		<td>{{$customer->gender}}</td>
	    		<td>{{$customer->customer_since}}</td>
	    		<td><a href="/customer/{{$customer->id}}">Details</a></td>
	    		<td><a href="/customer/{{$customer->id}}/newInvoice">New Invoice</a></td>

	    	</tr>
		@endforeach
</table>
@endsection