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

    public function index(){
    	$categories = Category::all();
    	// dd($posts);
    	// die;
    	return view('admin.category.index', compact('categories'));
    }
    public function add()
    {
    	return view('admin.category.add');	
    }
    public function store(Request $request)
    {
        # code...
    }
}
