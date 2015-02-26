<?php namespace App\Http\Controllers;

use DB;
use App\model\Item; //use the Item model below.

class ItemController extends Controller {

	public function all()
	{
		$items = DB::select("select * from item");

		return view("allItems", ["items"=>$items]);
	}

	//This grabs the $results function from the Item Model that is returning results
	// public function all() {
	// 	$result = Item::all();
	// 	return view(.......)
	// }





}
