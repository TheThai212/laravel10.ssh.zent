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

    public function getlist($value='')
    {
        $categories = Category::query();



         return datatables()->eloquent($categories)
        ->addColumn('action', function($categories){
            return '<div class="btn-group">

                        <a href="'.'category/'.$categories->id.'"><button class="btn btn-info btn-flat" userId="'.$categories->id.'"><i class="fa fa-eye"></i></button></a> 

                        <a href="'.'category/edit/'.$categories->id.'"><button class="btn btn-warning btn-flat" userId="'.$categories->id.'"><i class="fa fa-edit"></i> </button></a>

                        <button id="111" data-url="'.'/delete/'."$categories->id".'"  userId="'.$categories->id.'" class="btn btn-danger btn-flat btn-delete"><i class="fa fa-trash-o"></i></button>


                      </div>';
        })->editColumn('thumbnail', function($categories){
            return '<center><img style="width: 30%;height:30%;" class="img-fluid" src="'.'http://localhost/storage/'.$categories->thumbnail.'"></center>';
        })
        ->rawColumns(['action','thumbnail'])
        ->toJson();
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

        $path = $request->Thumbnail->store('images');
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $this->createSlug($request->name);
        $category->thumbnail = $path;
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
