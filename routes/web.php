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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Route::get('',function(){
// 	abort(404);
// });h
Route::get('uploadFile',function(){
	return view('up');
});
Route::get('go-to-trash',function(){
	$user = App\User::find(1)->delete();
	dd($user);
});
Route::get('trash',function(){
	//lay ban gi chi trong thung rac
	// $user = App\User::onlyTrashed()->where('email','thethai@gmail.com')->fist();
	
	// lay ban ghi trong ca thung rac va ngoai thug rac
	$user = App\User::withTrashed()->where('email','thethai.nguyen.212@gmail.com')->first();

	// khoi phuc dung ->restore()
	dd($user);

});

Route::post('upload',function(Request $request){
	//upload 1 file
	// $parth  = $request->images->store('images');
	// dd($parth);
	// 
	// xoa
	// Storage::delete();
	//nhieu file
	foreach($request->images as $key => $image){
		$image->store('images');//images la ten file trong storage
	};
});

// Route::get('/', 'HomeController@index');
Route::prefix('adm')->group(function(){

	Route::prefix('post')->group(function(){

		route::get('/','PostController@index');	
		route::get('/listpost','PostController@getlist')->name('listPost');
		route::get('/edit/{id}','PostController@edit');
		route::post('/update/{id}','PostController@update');
		route::get('/add','PostController@add');
		route::post('/add','PostController@store');
		route::delete('/delete/{id}','PostController@delete')->name('post.delete');

		route::get('/{id}','PostController@show');
	});
	
	Route::prefix('category')->group(function(){
		route::get('/','CategoryController@index');
		route::get('/listcategory','CategoryController@getlist')->name('listcategory');
			route::get('/add','CategoryController@add');
			route::post('/add','CategoryController@store');
			route::post('/delete/{id}','CategoryController@delete');


			route::get('/{id}','CategoryController@show');
	});
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
