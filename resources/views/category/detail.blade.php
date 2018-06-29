@extends('layouts.master')

@section('content')
	
    
	<section class="tada-container content-posts blog-3-columns">
    
    
        <!-- CONTENT COL 1 -->
        @foreach($category->posts as $post)
       <div class="content col-xs-4">
        
        
            <!-- ARTICLE 1 -->
            <article>
                <div class="post-image">
                    <img src="{{$post->thumbnail}}" alt="post image 1">
                    <div class="category"><a href="#">IMG</a></div>
                </div>
                <div class="post-text">
                    <span class="date">{{$post->created_at}}</span>
                    <h2><a href="{{asset("$category->slug/".$post->slug)}}">{{$post->title}}</a></h2>                                
                </div>
                <div class="post-info">
                    <div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>
        
       </div>
            @endforeach()
       

       
       <div class="content col-xs-4 clearfix">
       
                       
   
   
        </div>
        
        <div class="clearfix"></div>
        
        <!-- NAVIGATION -->
        <div class="navigation">
                <a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
                <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>
        </div>  
        
                  
    </section>

@endsection