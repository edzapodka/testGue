<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProductRequest;
use App\Jenis;
use App\Product;

use App\SubImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

//use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProductController extends Controller {


//	public function __construct()
//	{
//		$this->middleware('auth', ['only' => 'create']);
//	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::latest()->paginate(6);

		return view('product.index',compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = Jenis::lists('name', 'id');
		return view('product.create',compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Requests\CreateProductRequest $request
	 * @return Response
	 */

	public function store(Request $request)
	{
		$this->validate($request, [
			'code' => 'required|min:3|unique:products,code',
			'name'  => 'required',
			'price'  => 'required|integer',
			'size'  => 'required',
			'colour'  => 'required',
//			'image' => 'required',
			'keterangan'  => 'required',
			'published_at' => 'required|date',
		]);

		$input = $request->all();
		$product = new Product();

		if ($request->hasFile('image')) {
			$filename = Str::slug(Str::lower(
					pathinfo($input['image']->getClientOriginalName(), PATHINFO_FILENAME)
					. '-'
					. 'tn'

				)).'.'.$input['image']->getClientOriginalExtension();
			$pathToFile = public_path('images/');

			File::exists($pathToFile) or File::makeDirectory($pathToFile, $mode = 0777, true, true);
			Image::make($input['image']->getRealPath())
				->resize(600, 400)
				->save($pathToFile . $filename);
			$product->image = $filename;
		}
		$product->code = $input['code'];
		$product->name = $input['name'];
		$product->price = $input['price'];
		$product->size = $input['size'];
		$product->colour = $input['colour'];
		$product->keterangan = $input['keterangan'];
		$jenis = Auth::user()->product()->save($product);
		$jenis->jenis()->attach($request->input('tag_lists'));
		return redirect('dashboard/products');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		$subimage = $product->subimage()->get();
		return view('product.show', compact('product','subimage'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		$tags = Jenis::lists('name', 'id');
		return view('product.edit', compact('product','tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//dd($request->input('tag_lists'));
		$this->validate($request, [
			//'code' => 'required|min:3|unique:products,code',
			'name' => 'required',
			'price' => 'required|integer',
			'size' => 'required',
			'colour' => 'required',
			'keterangan' => 'required',
			//'image' => 'required',
			'published_at' => 'required|date',
		]);
		$input = $request->all();
		$product = Product::findOrFail($id);

		if ($request->hasFile('image'))
		{
			$filename = Str::slug(Str::lower(
					pathinfo($subimage->getClientOriginalName(), PATHINFO_FILENAME)
					. '-'
					. 'tn'

				)).'.'.$subimage->getClientOriginalExtension();
			$pathToFile = public_path('images/');
			File::exists($pathToFile) or File::makeDirectory($pathToFile, $mode = 0777, true, true);
			Image::make($input['image']->getRealPath())
				->resize(468, 249)
				->save($pathToFile . $filename);

		}
		$product->code = $input['code'];
		$product->name = $input['name'];
		$product->price = $input['price'];
		$product->size = $input['size'];
		$product->colour = $input['colour'];
		$product->keterangan = $input['keterangan'];
		$jenis = $product->save();
		$product->jenis()->sync($request->input('tag_lists'));
		return redirect('dashboard/products');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		$product->delete();
		return redirect('dashboard/products');
	}

	public function getSubimage($id)
	{
		$product = Product::findOrFail($id);
		$subimage = $product->subimage()->get();
		return view('product.subimage',compact('product','subimage'));
	}

	public function postSubimage(Request $request, $id)
	{
		$input = $request->all();

		$product  = Product::findOrFail($id);

		if ( $request->hasFile('subimage')){

			foreach($input['subimage'] as $subimage)
			{

					$filename = Str::slug(Str::lower(
						pathinfo($subimage->getClientOriginalName(), PATHINFO_FILENAME)
						. '-'
						. 'tn'

					)).'.'.$subimage->getClientOriginalExtension();
					$pathToFile = public_path('images/');

					File::exists($pathToFile) or File::makeDirectory($pathToFile, $mode = 0777, true, true);
					Image::make($subimage->getRealPath())
						->resize(600, 400)
						->save($pathToFile . $filename);
					$subImage = new SubImage();
					$subImage->name = $filename;
					$product->subimage()->save($subImage);


			}

		}else{
			return redirect()->back()->with('flash_message', 'silahkan masukan image nya');

		}
		return redirect()->back()->with('flash_message','image berhasil di upload');

	}

	public function postDeleteSubImage(Request $request)
	{
		$subimg = $request->input('subimg');
		if($subimg) {
			foreach ($subimg as $sub => $value) {
				SubImage::find($value)->delete();
			}
		}else{
			return redirect()->back()->with('flash_message', 'pilih image yang mau di delete');
		}
		return redirect()->back();

	}

	public function getTags($tags)
	{

		$jenis = Jenis::whereName($tags)->first();
		$categories = $jenis->products()->paginate();
		return view('product.categories',compact('categories'));



	}



}
