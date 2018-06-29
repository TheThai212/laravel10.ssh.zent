@extends('layouts.master')

@section('content')
	
    {{-- {{dd($post->title)}} --}}
    {{-- {{dd($post)}} --}}
	<section class="tada-container content-posts page post-left-sidebar">


        <!-- SIDEBAR -->
        <div class="sidebar col-xs-4">
            
            
            <!-- ABOUT ME -->                  
            <div class="widget about-me">
                <div class="ab-image">
                    <img src="{{ asset('blog_assets/img/about-me.jpg')}}" alt="about me">
                    <div class="ab-title">About Me</div>
                </div>
                <div class="ad-text">
                    <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    <span class="signing"><img src="{{ asset('blog_assets/img/signing.png')}}" alt="signing"></span>
                </div>
            </div>


            <!-- LATEST POSTS -->                              
            <div class="widget latest-posts">
                <h3 class="widget-title">
                    Latest Posts
                </h3>
                <div class="posts-container">
                    @foreach( $last5posts as $post)
                    <div class="item">
                        <img src="{{$post->thumbnail}}" alt="post 1" class="post-image">
                        <div class="info-post">
                            <h5><a href="{{asset('post/'.$post->slug)}}">{{$post->title}}</a></h5>
                            <span class="date">07 JUNE 2016</span>  
                        </div> 
                        <div class="clearfix"></div>   
                    </div>
                    @endforeach()
                    <div class="clearfix"></div>
                </div>
            </div>


            <!-- FOLLOW US -->                              
            <div class="widget follow-us">
                <h3 class="widget-title">
                    Follow Us
                </h3>
                <div class="follow-container">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>                
                </div>
                <div class="clearfix"></div>
            </div>            


            <!-- TAGS -->                              
            <div class="widget tags">
                <h3 class="widget-title">
                    Tags
                </h3>
                <div class="tags-container">
                    @foreach($tags as $tag)
                        <a href="{{asset('tag/'.$tag->slug)}}">{{$tag->name}}</a>  
                    @endforeach()                                  
                </div>
                <div class="clearfix"></div>
            </div> 


            <!-- ADVERTISING -->                              
            <div class="widget advertising">
                <div class="advertising-container">
                    <img src="{{ asset('blog_assets/img/350x300.png')}}" alt="banner 350x300">
                </div>
            </div>


            <!-- NEWSLETTER -->                              
            <div class="widget newsletter">
                <h3 class="widget-title">
                    Newsletter
                </h3>
                <div class="newsletter-container">
                    <h4>DO NOT MISS OUR NEWS</h4>
                    <p>Sign up and receive the <br> latest news of our company</p> 
                    <form>
                       <input type="email" class="newsletter-email" placeholder="Your email address...">
                       <button type="submit" class="newsletter-btn">Send</button>
                    </form>                                  
                </div>
                <div class="clearfix"></div>
            </div>  
            
        </div> <!-- #SIDEBAR -->


        <!-- CONTENT -->
        <div class="content col-xs-8">
        
        
            <!-- ARTICLE 1 -->

            <article>
                <div class="post-image">
                    <img src="{{$post1->thumbnail}}" alt="post image 1"> 
                </div>
                <div class="post-text">
                    <h2>{{$post1->title}}</h2>
                    
                </div>                 
                <div class="post-text text-content">                  
                    <div class="text">
                        <div class="des">{{$post1->description}}</div>
                    <div   class="gallery">
                        <div class="item-gallery-left">
                            <img style="padding-right: 20px;margin-top: 40px;" src="{{$post1->thumbnail}}">
                        </div>
                    </div>
                        <div class="cont">{{$post1->content}}</div>
                    <div class="clearfix"></div>
                    </div>
                    <div>
                        <div style="margin: 30px 0px; float: right"><strong>View:</strong> {{number_format($post1->view_count)}}</div>
                        <div style="padding: 30px 0px" class="tag">
                            <span><strong>Tag:</strong></span>
                            @foreach($post1->tags as $tag)
                            <a href="{{asset('tag/'.$tag->slug)}}">#{{$tag->name}} </a>
                            @endforeach()
                        </div>
                        <div style="padding: 0px 0px" class="cate">
                            <span><strong>Category:</strong></span>
                            
                            <a href="{{asset('category/'.$post1->category->slug)}}">{{$post1->category->name}} </a>
                            
                        </div>

                    </div>
                    
                </div>
            
            </article>

        
        </div>
        
        <div class="clearfix"></div>

        
    </section>

@endsection