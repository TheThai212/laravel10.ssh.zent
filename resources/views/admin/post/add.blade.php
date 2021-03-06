@extends('admin.master')

@section('content-header')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Add</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{asset('adm')}}">Home</a></li>
              <li class="breadcrumb-item active">Post Add</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection()

@section('content')
<div class="container">
	<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{asset('adm/post/add')}}" method="POST" role="form" enctype="multipart/form-data" >
                	{!! csrf_field() !!}
                	@if(count($errors) > 0)
      						<div class="alert alert-danger">
      							@foreach($errors->all() as $err)
      								{{$err}}<br>
      							@endforeach
      						</div>
                	@endif()
                   @if(session('noti'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success</strong> {{session('noti')}}.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @endif
                  <!-- text input -->
                  <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter ...">
                  </div>
                   <div class="form-group">
                    <label>Thumbnail</label>
                      Select image to upload:
                        <input  type="file" name="Thumbnail" id="fileToUpload">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                      <select name="category_id">
                        @foreach($categories as $cate)
                        <option value="{{$cate->id}}" >{{$cate->name}}</option>
                        @endforeach()
                      </select>
                  </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label>description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" name="contents" rows="5"></textarea>
						<script>
						    CKEDITOR.replace( 'content' );
						</script>
                  </div>

				  <center>
                    <button type="submit"  class="btn btn-block btn-outline-success btn-lg">Add</button>
				  </center>
					

                </form>
              </div>
              <!-- /.card-body -->
            </div>
</div>
	
@endsection()