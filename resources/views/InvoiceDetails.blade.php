@extends('layout')

@section('main_content')
This is a customer detail page

<table border=1 >
	<tr>
		<td>Quantity</td>
		<td>Item</td>
		<td>Cost</td>
		<td>Subtotal</td>
	</tr>
	@foreach ($invoice as $invoice)
	<tr>

		<td>{{$invoice->qty}}</td>
		<td>{{$invoice->name}}</td>
		<td>{{$invoice->price}}</td>
		<td>{{$invoice->subtotal}}</td>
	</tr>
	@endforeach
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>{{$total}}</td>
	</tr>
</table>
@endsection