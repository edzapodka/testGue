<?php namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = Gallery::latest()->paginate(8);
		return view('gallery.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	public function postGallery(Request $request)
	{
		$input = $request->all();

		if ( $request->hasFile('subimage')){

			foreach($input['subimage'] as $subimage)
			{

				$filename = Str::slug(Str::lower(
						pathinfo($subimage->getClientOriginalName(), PATHINFO_FILENAME)
						. '-'
						. 'tn'

					)).'.'.$subimage->getClientOriginalExtension();
				$pathToFile = public_path('images/gallery/');

				File::exists($pathToFile) or File::makeDirectory($pathToFile, $mode = 0777, true, true);
				Image::make($subimage->getRealPath())
					->resize(600, 400)
					->save($pathToFile . $filename);
				$gallery = new Gallery();
				$gallery->name = $filename;
				Auth::user()->gallery()->save($gallery);


			}

		}else{
			return redirect()->back()->with('flash_message', 'silahkan masukan image nya');

		}
		return redirect()->back()->with('flash_message','image berhasil di upload');

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete(Request $request)
	{
		$subimg = $request->input('subimg');
		if($subimg) {
			foreach ($subimg as $sub => $value) {
				Gallery::find($value)->delete();
			}
		}else{
			return redirect()->back()->with('flash_message', 'pilih image yang mau di delete');
		}
		return redirect()->back();
	}

}
