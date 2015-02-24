<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Request;


class ArticleController extends Controller {

	
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'create']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest()->paginate(5);


		return view('article.index', compact('articles', 'slug'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return Str::slug('i clean up', '-');
		return view('article.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateArticleRequest $request
	 * @return Response
	 */
	public function store(CreateArticleRequest $request)
	{
		$article = new Article($request->all());
		Auth::user()->article()->save($article);
		return redirect('article');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $slug
	 * @return Response
	 * @internal param int $id
	 */
	public function show($slug)
	{
		$article = Article::whereSeo_title($slug)->first();


		return view('article.show', compact('article', 'slug'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		return view('article.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateArticleRequest $request, $id)
	{
		$input = $request->all();
		
		$article = Article::findOrFail($id);
		$article->title = $input['title'];
		$article->body = $input['body'];
		$article->seo_title = Str::slug($input['title']);
		$article->save();
		return redirect('article');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getSlug($title, $model)
	{
		$slug = Str::slug($title);
		$slugCount = count( $model->whereRaw("title REGEXP '^{$slug}(-[0-9]*)?$'")->get() );

		return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}
}


