<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public static function createSlug($str, $delimiter = '-'){

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

    } 
    public function detail($slug){
    	$category = Category::where(
    					'slug', '=', $slug
    					)->firstOrFail();
    	return view('category.detail', compact('category'));
    }
    public function show($id)
    {
       $category = Category::find($id);
       return view('admin.category.detail', compact('category'));
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
        $this->validate($request,[


                'name'=>'required',
                'description'=>'required',
        ],[



        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $this->createSlug($request->name);
        $category->save();
        return redirect('adm/category/add')->with('noti','thêm thành công');
    }

    public function delete($id){
        $category = Category::find($id);
        // $post;
        // die;
        $category->delete();
        return redirect('adm/category');
    }
}
