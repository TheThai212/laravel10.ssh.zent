@extends('layouts.master')

@section('content')
	

	<section class="tada-container content-posts blog-2-columns blog-2-columns-sidebar">


      <!-- CONTENT -->    
      <div class="content col-xs-8">

        <div  class="row">
                <div  class="col-xs-12 clearfix">
        
        
              <!-- ARTICLE -->
            @foreach( $posts as $post)
            <article ">
                <div class="post-image">
                    <img src="{{$post->thumbnail}}" alt="post image 1">
                    <div class="category"><a href="{{asset('category/$post->slug')}}">IMG</a></div>
                </div>
                <div class="post-text">
                    <span class="date">{{$post->thumbnail}}</span>
                    <h2><a href="{{asset('post/'.$post->slug)}}">{{$post->title}}</a></h2>                            
                </div>
                <div class="post-info">
                    <div class="post-by">Post By <a href="#">AD-Theme</a></div>
                </div>
            </article>
            @endforeach()
        
        
                </div>

        </div>
        
          
   
          



        
        
        <!-- NAVIGATION -->

                {{-- {{  $posts->appends(['manh'=>'tung'])->links() }} --}}
        <div class="navigation">
                <a href="{{$posts->previousPageUrl()}}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
                <a href="{{$posts->nextPageUrl()}}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>


        </div>  
      
      
      </div><!-- #CONTENT -->
      
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
                    <form action="/postMail" method="POST">
                        {{csrf_field()}}
                        <label>Name</label>
                       <input type="text" name="name" class="newsletter-email" placeholder="Your email address...">
                        <label>Message</label>
                       <input type="text" name="message" class="newsletter-email" placeholder="Your email address...">


                       <button type="submit" class="newsletter-btn">Send</button>
                    </form>                                  
                </div>
                <div class="clearfix"></div>
            </div>  
            
        </div> <!-- #SIDEBAR -->      
      
        <div class="clearfix"></div>
      
                  
    </section>

@endsection