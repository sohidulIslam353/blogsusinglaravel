@extends('master')
@section('content')


            <div class="post_section">
             
            	<div class="post_date">
                    {{$blog_info->created_at}}
                    
            	</div>
           
                  <div class="post_content">                
                    <h2>{{$blog_info->blog_title}}</h2>
                    <strong>Total View:</strong> {{$blog_info->hit_count}}  <strong>Category:</strong> <a href="#">{{$blog_info->category_name}}</a>
                    
                    <a href="" target="_parent"><img src="{{URL::to($blog_info->blog_image)}}" alt="image" height="200" width="400" /></a>
                    
                    <p>{{htmlspecialchars_decode($blog_info->blog_long_description)}}                </p>
                   </div>
                   
                <div class="cleaner"></div>
            </div>
            
         
            
    @endsection