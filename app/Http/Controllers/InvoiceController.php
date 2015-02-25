<?php namespace App\Http\Controllers;

class InvoiceController extends Controller {


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function all()
	{
		return view('allInvoices');
	}

}
