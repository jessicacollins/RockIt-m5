@extends('layout')

@section('main_content')
This is a customer detail page

<table border=1 >
	<tr>
		<td>Quantity</td>
		<td>Item</td>
		<td>Cost</td>
		<td>Subtotal</td>
		<td>Delete</td>
	</tr>
	@foreach ($invoiceItems as $item)
	<tr>

		<td>{{$item->qty}}</td>
		<td>{{$item->name}}</td>
		<td>{{$item->price}}</td>
		<td>{{$item->subtotal}}</td>
		<td><a href="/invoice/{{$item->id}},{{$invoice_id}}/removeItem">Remove</a></td>
	</tr>
	@endforeach
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>{{$total}}</td>
	</tr>
</table>

<form action="/invoice/{{$invoice_id}}/addItem/" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<table>
		<tr>
			<td>Qty</td>
			<td>Item</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="qty">
			</td>
			<td>
				<select name="item_id">
					<option value="" selected>Choose</option>
					@foreach($items as $item)
						<option value="{{$item->id}}">{{$item->name}}</option>
					@endforeach
				</select>
			</td>
			<td>
				<button type="submit" class="add">Add</button>
			</td>
		</tr>
	</table>
	

</form>
@endsection