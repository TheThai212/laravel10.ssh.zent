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

Route::get('/', function () {
    return view('post.home');
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


