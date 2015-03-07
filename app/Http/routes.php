<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Article;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

Event::listen('illuminate.query',function($query){
	//var_dump($query);
});

//Route::get('/', 'PagesController@index');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
//Route::resource('article', 'ArticleController');


Route::get('products',['as' => 'product.index', 'uses' => 'ProductController@index']);
Route::get('products/jenis/{tags}',['as' => 'product.tags', 'uses' => 'ProductController@getTags']);
Route::get('products/{id}',['as' => 'product.show', 'uses' => 'ProductController@show']);

// Route Gallery
Route::get('gallery',['as' => 'gallery.index', 'uses' => 'GalleryController@index']);
Route::get('about',['as' => 'about.index', 'uses' => 'AboutController@index'] );

Route::get('contact', function(){

	return view('contact');
});
// Route Dashboard

Route::group(['middleware' => 'auth','prefix' => 'dashboard'], function()
{
	Route::get('products', 'ViewProductController@index');
	Route::get('products/create',['as' => 'product.create', 'uses' => 'ProductController@create']);
	Route::get('products/{id}/edit',['as' => 'product.edit', 'uses' => 'ProductController@edit']);
	Route::post('products/store',['as' => 'product.store', 'uses' => 'ProductController@store']);
	Route::put('products/{id}',['as' => 'product.update', 'uses' => 'ProductController@update']);
	Route::delete('products/{id}',['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);
	//sub image
	Route::get('products/{id}/subimage', ['as' => 'product.subimage', 'uses' => 'ProductController@getSubimage']);
	Route::post('products/{id}/subimage', ['as' => 'product.subimage.store', 'uses' => 'ProductController@postSubimage']);
	Route::post('products/subimage/delete', ['as' => 'product.subimage.destroy', 'uses' => 'ProductController@postDeleteSubimage']);

	//Gallery
	Route::get('gallery', 'ViewGalleryController@index');
	Route::get('gallery/create',['as' => 'gallery.create', 'uses' => 'GalleryController@create']);
	Route::post('gallery/store',['as' => 'gallery.store', 'uses' => 'GalleryController@postGallery']);
	Route::get('gallery/{id}/edit',['as' => 'gallery.edit', 'uses' => 'GalleryController@edit']);
	Route::put('gallery/{id}',['as' => 'gallery.update', 'uses' => 'GalleryController@update']);
	Route::post('gallery/delete',['as' => 'gallery.destroy', 'uses' => 'GalleryController@postDelete']);

	//About Us
	Route::get('about/{id}/edit', ['as' => 'about.edit', 'uses' => 'AboutController@edit']);
	Route::put('about/{id}', ['as' => 'about.update', 'uses' => 'AboutController@update']);

});

Route::post('mail', ['as' => 'mail.store' , function(Request $request)
{
	$input =  $request->all();
	//dd($input);
	$data = [
		'name' => $input['name'],
		'address' => $input['address'],
		'email' => $input['email'],
		'phone' => $input['phone'],
		'comment' => $input['comment']

	];
 	$email = Mail::send('emails.message', $data,function($message){
		$message->to('info@gambinojeans.com', 'gambino jeans')->subject('Info FROM gambinojeans');
	});
	if ($email){
		return redirect()->back()->with('flash_message', 'your message has been sent');
	}
	return redirect()->back()->with('flash_message', 'your message cannot delivered');
}]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('pass', function(){
	return bcrypt('abcd123');
});


