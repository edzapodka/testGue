<?php namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

class ViewGalleryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Request::input('q');

		$galleries = $query
			? Gallery::where('name', 'LIKE', "%$query%" )->paginate(9)
			: Gallery::latest()->paginate(9);

		return view('dashboard.gallery',compact('galleries'));
	}



}
