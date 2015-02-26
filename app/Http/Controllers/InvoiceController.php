<?php namespace App\Http\Controllers;

use DB;

class InvoiceController extends Controller {


	public function all() {
		$invoice = DB::select("
			SELECT invoice_id, first_name, last_name, SUM(quantity*price) as 'subtotal'
			FROM customer
			JOIN invoice ON (customer.id = invoice.customer_id)
			JOIN invoice_item ON (invoice.id = invoice_item.invoice_id)
			JOIN item ON (invoice_item.item_id = item.id)
			group by invoice_id;
			");
		
		return view("allInvoices", ["invoice"=>$invoice]);
	}

	public function details($invoice_id) {

		$invoice = DB::select("
			SELECT ii.quantity as 'qty', it.name as 'name', it.price as 'price', ii.id as 'id', (ii.quantity*it.price) as 'subtotal'
			FROM invoice i, invoice_item ii, item it
			WHERE i.id = :invoiceId
			AND ii.invoice_id = i.id
			AND it.id = ii.item_id",
			[":invoiceId"=>$invoice_id]
			);
		
		$total = 0;
		foreach ($invoice as $item) {
			$total += $item->subtotal;
		}

		return view("InvoiceDetails", ["invoice"=>$invoice, "total"=>$total]);

	}

	public function newInvoice($id) {


		DB::insert(" 
			INSERT INTO invoice (customer_id, created_at) VALUES (?, Now())",
			array($id)
			);

		echo "hi";

		$pdo = DB::getPdo();
		$invoice_id = $pdo->lastInsertId();


		echo $invoice_id;

		// $returnUrl = "InvoiceDetails/" . $invoice_id  ;
		// print_r($returnUrl);

	 	return redirect("invoice/" . $invoice_id);
	}

}
