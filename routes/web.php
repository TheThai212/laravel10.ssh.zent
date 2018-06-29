<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Tags;

Route::get('/', 'HomeController@index');
Route::prefix('adm')->group(function(){
	route::get('/','PostController@index')->name('listPost');
	route::get('/post/{id}','PostController@show');
	route::get('/post/edit/{id}','PostController@edit');
	route::post('/post/delete/{id}','PostController@delete');
});

Route::get('/SweetAlert',
			[
				'as'=>'SweetAlert',
				'uses'=>'sweetAlertDemo@index'

			]);
// Route::controller('datatables', 'DatatablesController', [
//     'anyData'  => 'datatables.data',
//     'getIndex' => 'datatables',
// ]);
//datatable
Route::get('/user','UserControllerl@index');
Route::get('/listuser','UserControllerl@datatablesListUser')->name('listuser');



Route::get('showphone', 'HomeController@showphone');
Route::get('showuser', 'HomeController@showuser');

Route::get('showpost', 'HomeController@admin');




Route::get('post_tag', function () {
	$tag = Tags::find(1);
    dd("$tag->posts");
    dd($tag->posts);
});


Route::get('post', function () {
    return view('post.post');
});

Route::get('index', function () {
    return view('post.home');
});

Route::get('detail', function () {
    return view('post.detail');
});

Route::get('hello', function () {
    return view('post.hello');
});

Route::get('join',function(){
	$user = \App\User::select('users.name','users.email','phones.mobile')->join('phones','users.id', '=' , 'phones.user_id')->where('users.name','LIKE','%admin%')->first();
	dd($user->mobile);
});


Route::prefix('category')->group(function(){
	route::get('/{slug}','CategoryController@detail')->name('blog.category.detail');
});

Route::prefix('tag')->group(function(){
	route::get('/{slug}','TagController@detail')->name('blog.tag.detail');
});
	

	route::get('/{category}/{slug}','PostController@detail')->name('blog.post.detail');
	route::get('/{tag}/{slug}','PostController@detail')->name('blog.post.detail');


Route::get('search','HomeController@search');


Route::post('postMail','HomeController@post');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
