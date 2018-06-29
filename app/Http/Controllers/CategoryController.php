<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function detail($slug){
    	$category = Category::where(
    					'slug', '=', $slug
    					)->firstOrFail();
    	return view('category.detail', compact('category'));
    }
}
