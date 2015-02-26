@extends('layout')

@section('main_content')
This is a customer detail page

<table border=1 >
	<tr>
		<td>First Name {{$customer->first_name}}</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Gender</td>
		<td>Customer Since</td>

	</tr>
</table>
@endsection