@extends('admin.master')

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
              <h3 class="card-title">List all post</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
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
                          <a href="{{asset("adm/post/delete/$post->id")}}"> <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i></i></button></a>
	                       
	                      </div>
	                    </td>
	                </tr>
	            @endforeach()
                </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Content</th>
                  <th>View count</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->

@endsection()