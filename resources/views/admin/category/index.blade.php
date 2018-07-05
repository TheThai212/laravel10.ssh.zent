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
            <h1 class="m-0 text-dark">Category List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{asset('adm')}}">Home</a></li>
              <li class="breadcrumb-item active">Category List</li>
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
              <h3 style="float: left; margin-right: 30px" class="card-title">List all Category</h3>
              <a href="{{asset('adm/category/add')}}"><button style="width: 100px;" type="button" class="btn btn-block btn-success btn-sm">add new</button></a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="cate-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Thumbnail</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
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