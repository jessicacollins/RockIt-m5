@extends('layout')

@section('main_content')
This is all invoices
<table border=1 >
	<tr>
		<td>#</td>
		<td>Customer Name</td>
		<td>Total</td>
		<td>Details</td>
	</tr>
		@foreach ($invoice as $invoice)
	    	<tr>
	    		<td>{{$invoice->invoice_id}}</td>
	    		<td>{{$invoice->first_name}} {{$invoice->last_name}}</td>
	    		<td>{{$invoice->subtotal}}</td>
	    		<td><a href="/invoice/{{$invoice->invoice_id}}">Details</a></td>
	    	</tr>
		@endforeach
</table>


@endsection