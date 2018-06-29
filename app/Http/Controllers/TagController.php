<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function detail($slug){
    	$tag = Tags::where(
    					'slug', '=', $slug
    					)->first();
    	// dd($tag->posts);
    	return view('tag.detail', compact('tag'));
    }

}
