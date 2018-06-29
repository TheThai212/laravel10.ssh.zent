@extends('admin.master')

@section('content-header')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{asset('adm')}}">Home</a></li>
              <li class="breadcrumb-item active">Post Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection()

@section('content')
<div class="container">
	<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Title</label>
                    <input value="{{$post->title}}" type="text" class="form-control" placeholder="Enter ...">
                  </div>
                   <div class="form-group">
                    <label>Thumbnail</label>
                    <input value="{{$post->thumbnail}}" type="text" class="form-control" placeholder="Enter ...">
                  </div>

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ...">{{$post->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" name="contents" rows="5">{{$post->content}}</textarea>
						<script>
						    CKEDITOR.replace( 'contents' );
						</script>
                  </div>

				  <center>
                    <button type="submit"  class="btn btn-block btn-outline-success btn-lg">Save</button>
				  </center>
					

                </form>
              </div>
              <!-- /.card-body -->
            </div>
</div>
	
@endsection()