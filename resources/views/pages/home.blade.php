@extends('master')
@section('content')

@foreach($published_blog as $v_blog)
            <div class="post_section">
             
            	<div class="post_date">
                    {{$v_blog->created_at}}
                    
            	</div>
           
                  <div class="post_content">                
                    <h2><a href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}">{{$v_blog->blog_title}}</a></h2>
                    <strong>Author:</strong> Sohidul Islam | <strong>Category:</strong> <a href="#">{{$v_blog->category_name}}</a>
                    
                    <a href="" target="_parent"><img src="{{$v_blog->blog_image}}" alt="image" height="200" width="400" /></a>
                    
                    <p>{{htmlspecialchars_decode($v_blog->blog_short_description)}} <a href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}">Continue reading...</a>                </p>
                   </div>
                   
                <div class="cleaner"></div>
            </div>
            @endforeach
         
            
    @endsection