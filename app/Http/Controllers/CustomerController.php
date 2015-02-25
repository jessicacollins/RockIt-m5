<?php namespace App\Http\Controllers;

use DB;
use App\Library\Foo;

class CustomerController extends Controller {


	public function index () {

		$foo = new Foo();
		return $foo->bar();
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function all()
	{
		$customer = DB::select('select * from customer');
		
		return view("allCustomers", ["customer"=>$customer]);
	}

		public function details($id)
	{

		$customer = DB::select(
			"select * from customer where id=:id",
			[":id"=>$id]
			);
		
		return view("CustomerDetails", ["customer"=>$customer[0]]);

	}



}


