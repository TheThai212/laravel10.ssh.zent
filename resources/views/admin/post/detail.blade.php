@extends('admin.master')

@section('content-header')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{asset('adm')}}">Home</a></li>
              <li class="breadcrumb-item active">Post detail</li>
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
          <h3 class="card-title"><legend>{{$post->title}}</legend></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>

		<div class="card-body">
	        <legend>Thumbnail</legend>
	        <center><img style="width: 50%;height: 50%;" src="{{Storage::url($post->thumbnail)}}"></center>
        </div>
		<div class="card-body">
	        <legend>Description</legend>
	          {{$post->description}}
        </div>
        <div class="card-body">
	        <legend>Content</legend>
	          {{$post->content}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        	tag:
           @foreach($tags as $tag)
                        <a href="{{asset('tag/'.$tag->slug)}}">#{{$tag->name}} </a>  
                    @endforeach()   
        </div>
        <!-- /.card-footer-->
      </div>
@endsection()