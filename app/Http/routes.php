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

Event::listen('illuminate.query',function($query){
	//var_dump($query);
});

//Route::get('/', 'PagesController@index');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
//Route::resource('article', 'ArticleController');

// Route Dashboard Group Product
Route::get('products',['as' => 'product.index', 'uses' => 'ProductController@index']);
Route::get('products/{id}',['as' => 'product.show', 'uses' => 'ProductController@show']);
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
});




Route::get('file', function()
{
//	$products = Product::latest()->paginate(9);
//
//	return view('dashboard.product',compact('products'));

});
//Route::get('product/{id}/{jenis}', 'ProductController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);




