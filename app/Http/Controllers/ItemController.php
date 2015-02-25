<?php namespace App\Http\Controllers;

class ItemController extends Controller {

	public function all()
	{
		$items = DB::select('select * from item');

		return view('allItems', ['items'=>$items]);
	}

}
