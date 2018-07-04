@extends('admin.master')

@section('header')
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection()

@section('content-header')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{asset('adm')}}">Home</a></li>
              <li class="breadcrumb-item active">Post List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection()

@section('content')
          <div class="card">
            <div class="card-header">
              <h3 style="float: left; margin-right: 30px" class="card-title">List all post</h3>
              <a href="{{asset('adm/post/add')}}"><button style="width: 100px;" type="button" class="btn btn-block btn-success btn-sm">add new</button></a>
            </div>
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="post-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Content</th>
                  <th>Thumbnail</th>
                  <th>View count</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
	                <tr>
                    <td>{{$post->title}}</td>
	                  <td>{{$post->description}}</td>
	                  <td>{{ \Illuminate\Support\Str::words($post->content, 30)}}</td>
	                  <td><center><img style="width: 70%;height: 30%;" src="{{$post->thumbnail}}"></center></td>
	                  <td>{{$post->view_count}}</td>
	                   <td>
	                      <div class="btn-group">
	                        	<a href="{{asset("adm/post/$post->id")}}"><button type="button" class="btn btn-info btn-flat"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
	                        
	                        <a href="{{asset("adm/post/edit/$post->id")}}"><button type="button" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></button></a>
                          <a href="javascript:"><button data-toggle="modal" data-target="#delete" data-id="{{$post->id}}" type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i></i></button></a>
	                       
	                      </div>
	                    </td>
	                </tr>
                  <div  class="modal fade" id="delete">
                  <div  class="modal-dialog" role="document">
                    <div  class="modal-content">
                      <div class="modal-header">
                        <h4  class="modal-title">Delete comfirmation</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure?</p>
                      </div>
                      <form action="{{asset("adm/post/delete/$post->id")}}" method="POST">
                        {{csrf_field()}}
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel!</button>
                          <button type="submit" class="btn btn-danger">Sure!</button>
                        </div> 
                      </form>

                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
	            @endforeach()
                </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Content</th>
                  <th>Thumbnail</th>
                  <th>View count</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              
            </div>
                
            <!-- /.card-body -->
@endsection()

@section('footer')
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        
@endsection()