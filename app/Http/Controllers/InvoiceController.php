<?php namespace App\Http\Controllers;

use DB;
use Request; 

class InvoiceController extends Controller {


	public function all() {
		$invoice = DB::select("
			SELECT invoice_id, first_name, last_name, item_id, SUM(quantity*price) as 'subtotal'
			FROM customer
			JOIN invoice ON (customer.id = invoice.customer_id)
			JOIN invoice_item ON (invoice.id = invoice_item.invoice_id)
			JOIN item ON (invoice_item.item_id = item.id)
			group by invoice_id;
			");
		
		return view("allInvoices", ["invoice"=>$invoice]);
	}

	public function details($invoice_id) {

		$invoiceItems = DB::select("
			SELECT ii.quantity as 'qty', it.name as 'name', it.price as 'price', ii.id as 'id', (ii.quantity*it.price) as 'subtotal'
			FROM invoice i, invoice_item ii, item it
			WHERE i.id = :invoiceId
			AND ii.invoice_id = i.id
			AND it.id = ii.item_id",
			[":invoiceId"=>$invoice_id]
			);
		
		$total = 0;
		foreach ($invoiceItems as $item) {
			$total += $item->subtotal;
		}

		$items = DB::select("
			SELECT id, name FROM item
			");

		return view("InvoiceDetails", ["invoice_id"=>$invoice_id, "invoiceItems"=>$invoiceItems, "total"=>$total, "items"=>$items]);

	}

	public function newInvoice($id) {

		DB::insert(" 
			INSERT INTO invoice (customer_id, created_at) VALUES (?, Now())",
			array($id)
			);

		$pdo = DB::getPdo();
		$invoice_id = $pdo->lastInsertId();

	 	return redirect("invoice/" . $invoice_id);
	}

	public function addItem($invoice_id) {
		$qty = Request::input('qty');
		$item_id = Request::input('item_id');

		echo $invoice_id;

		$addInvoiceItemSql = DB::insert("
			INSERT INTO invoice_item (quantity, item_id, invoice_id) 
			VALUES (:qty, :item_id, :invoice_id)",
			[":invoice_id"=>$invoice_id, ":item_id"=>$item_id, ":qty"=>$qty]
			);

		// return redirect("invoice/" . $invoice_id);	
		return redirect()->back()->withInput(['id', $invoice_id]);
	}

	public function removeItem($id, $invoice_id) {
		$removeInvoiceItem = DB::delete("DELETE FROM invoice_item WHERE id = :id",
		[":id"=>$id]);

		return redirect()->back()->withInput(['id', $invoice_id]);
	}
}
