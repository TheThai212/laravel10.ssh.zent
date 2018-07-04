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
                <form action="{{asset("adm/post/update/$post->id")}}" role="form" enctype="multipart/form-data" method="POST">
                  {{@csrf_field()}}
                  <!-- text input -->
                  <div class="form-group">
                    <label>Title</label>
                    <input name="title" value="{{$post->title}}" type="text" class="form-control" placeholder="Enter ...">
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
                        <option value="{{$cate->id}}" 
                          @if($cate->id == $post->category_id ){!!'selected'!!}

                          @endif>{{$cate->name}}</option>
                        @endforeach()
                      </select>
                  </div>       
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{$post->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" name="contents" rows="5">{{$post->content}}</textarea>
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