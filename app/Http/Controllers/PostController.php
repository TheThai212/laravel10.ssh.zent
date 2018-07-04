<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Yajra\Datatables\Datatables;
class PostController extends Controller
{
        var  $str = 'thế thái';
        var $slug;
    public function detail($categorys,$post_slug){
    	$post1 = Post::where(
    					'slug', '=', $post_slug
    					)->firstOrFail();
    	return view('post.detail', compact('post1'));
    }
    public function index(){
    	$posts = Post::all();
    	// dd($posts);
    	// die;
    	return view('admin.post.index', compact('posts'));
    }
    function add(){
    	return view('admin.post.add');	

    }
    public function show($id){
    	 $post = Post::find($id);
    	 return view('admin.detail', compact('post'));
    }
    public function edit($id){
         $post = Post::find($id);
         return view('admin.edit', compact('post'));
    }
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('adm');
    }
    public function dataTable()
    {
        return Datatables::of(Post::query())->make(true);
        
    }
}