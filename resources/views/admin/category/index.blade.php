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
              <a href="{{asset('adm/category/add')}}"><button style="width: 100px;" type="button" class="btn btn-block btn-success btn-sm">add new</button></a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="post-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Thumbnail</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $cate)
	                <tr>
                    <td>{{$cate->name}}</td>
	                  <td>{{$cate->thumbnail}}</td>
	                  <td>{{ \Illuminate\Support\Str::words($cate->description, 30)}}</td>
	                  
	                   <td>
	                      <div class="btn-group">
	                        	<a href="{{asset("adm/category/$cate->id")}}"><button type="button" class="btn btn-info btn-flat"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
	                        
	                        <a href="{{asset("adm/category/edit/$cate->id")}}"><button type="button" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></button></a>
                          <a href="javascript:"><button data-toggle="modal" data-target="#delete" data-id="{{$cate->id}}" type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i></i></button></a>
	                       
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
                      <form action="{{asset("adm/category/delete/$cate->id")}}" method="POST">
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
                  <th>Name</th>
                  <th>Thumbnail</th>
                  <th>Description</th>
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