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
    public function getList(){
       $posts = Post::query();
        return datatables()->eloquent($posts)
        ->addColumn('action', function($posts){
            return '<div class="btn-group">

                        <a href="'.'post/'.$posts->id.'"><button class="btn btn-info btn-flat" userId="'.$posts->id.'"><i class="fa fa-eye"></i></button></a> 

                        <a href="'.'post/edit/'.$posts->id.'"><button class="btn btn-warning btn-flat" userId="'.$posts->id.'"><i class="fa fa-edit"></i> </button></a>

                        <button data-url="'.'/delete/'."$posts->id".'"  userId="'.$posts->id.'" class="btn btn-danger btn-flat btn-delete"><i class="fa fa-trash-o"></i></button>


                      </div>';
            // return '<div class="btn-group">
            //                     <a href="{{asset("adm/post/$post->id")}}"><button type="button" class="btn btn-info btn-flat"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            
            //                 <a href="{{asset("adm/post/edit/$post->id")}}"><button type="button" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></button></a>
            //              <button  data-url="{{route('post.delete',$post->id)}}" type="button" class="btn btn-danger btn-flat btn-delete"><i class="fa fa-trash-o"></i></i></button>
                           
            //               </div>'
        })->editColumn('thumbnail', function($posts){
            return '<center><img style="width: 30%;height:30%;" class="img-fluid" src="'.'http://localhost/storage/'.$posts->thumbnail.'"></center>';
        })
        ->rawColumns(['action','thumbnail'])
        ->toJson();// 
    }
    function add(){
    	return view('admin.post.add');	

    }
    public function store(Request $request)
    {
    	$this->validate($request,
    		[
    			'title'=>'required',
    			'description'=>'required',
    			'content'=>'required',
    			'category_id'=>'required',
    		],[

    		]);
    	$path = $request->Thumbnail->store('images');
    	// dd($path);
    	// die;
    	$post = new Post;
    	$post->title = $request->title;
    	$post->Thumbnail = $path;
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
    	 return view('admin.post.detail', compact('post'));
    }
    public function edit($id){
         $post = Post::find($id);
         return view('admin.post.edit', compact('post'));
    }
    public function update(Request $request,$id)
    {
    	$post = Post::find($id);
    	$this->validate($request,
    		[
    			'title'=>'required',
    			'description'=>'required',
    			'content'=>'required',
    			'category_id'=>'required',
    		],[

    		]);  
    	$post->title = $request->title;
    	$post->Thumbnail = $request->Thumbnail;
    	$post->description = $request->description;
    	$post->slug = $this->createSlug($request->description);
    	$post->content = $request->content;
    	$post->category_id = $request->category_id;
    	$post->tag_id = 1;
    	$post->user_id = 1;
    	$post->save();
    	return redirect('adm/post')->with('noti','Sửa thành công');  

    }
    public function delete($id){
        $post = Post::find($id);
        // $post;
        // die;
        $post->delete();
        return response()->json([
            'noti' => 'deleted'
        ],200);
    }
    public function dataTable()
    {
        return Datatables::of(Post::query())->make(true);
        
    }
}