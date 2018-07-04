<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Yajra\Datatables\Datatables;
class PostController extends Controller
{
    public static function createSlug($str, $delimiter = '-'){

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

} 
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
    public function store(Request $request)
    {
    	$this->validate($request,
    		[
    			'title'=>'required',
    			'Thumbnail'=>'required',
    			'description'=>'required',
    			'content'=>'required',
    			'category_id'=>'required',
    		],[

    		]);
    	// dd($request);
    	$post = new Post;
    	$post->title = $request->title;
    	$post->Thumbnail = $request->Thumbnail;
    	$post->description = $request->description;
    	$post->slug = $this->createSlug($request->description);
    	$post->content = $request->content;
    	$post->category_id = $request->category_id;
    	$post->tag_id = 1;
    	$post->user_id = 1;
    	$post->save();
    	return redirect('adm/post/add')->with('noti','thêm thành công');

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