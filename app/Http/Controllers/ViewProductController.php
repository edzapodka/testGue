<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Request;


class ViewProductController extends Controller {


//	public function __construct()
//	{
//		$this->middleware('auth',['only' => 'create']);
//	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$query = Request::input('q');

		$products = $query
			? Product::where('name', 'LIKE', "%$query%" )->paginate(9)
			: Product::latest()->paginate(9);

		return view('dashboard.product',compact('products'));
	}



}
