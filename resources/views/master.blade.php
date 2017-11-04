<!DOCTYPE >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EcHo Blog </title>
<meta name="keywords" content="Red Blog Theme, Free CSS Templates" />
<meta name="description" content="Red Blog Theme - Free CSS Templates by templatemo.com" />
<link href="{{asset('templatemo_style.css')}}" rel="stylesheet" type="text/css" />
{{-- Authentication link and js code --}}
<link href="{{URL::to('/css/app.css')}}" rel="stylesheet">
<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>



</head>
<body>

<div id="templatemo_top_wrapper">
	<div id="templatemo_top">
    
        <div id="templatemo_menu">
                    
            <ul>
                <li><a href="{{URL::to('/')}}" {{-- class="current" --}}>Home</a></li>
                <li><a href="{{URL::to('/portfolio')}}">Portfolio</a></li>
                <li><a href="{{URL::to('/service')}}">Services</a></li>
                <li><a href="{{URL::to('/contact')}}">Contact Us</a></li>
            </ul>    	
        
        </div> <!-- end of templatemo_menu -->
        
        <div>
        	<a   style="color: white; font-size: 14px; text-decoration: none;" href="{{URL::to('/login')}}">Login <br /></a>
        	<a  style="color: white; font-size: 14px; text-decoration: none;" href="{{URL::to('/register')}}">SignUp</a>
        </div>
        
  </div>
</div>

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1><a href="" target="_parent"><strong>EcHo Blog</strong><span>Learn step by step</span></a></h1>
        </div>
    
    </div>
</div>

<div id="templatemo_main_wrapper">
	<div id="templatemo_main">
		<div id="templatemo_main_top">
        
        	<div id="templatemo_content">
        
    		 @yield('content')
        
       	  </div>
            
         
          <div id="templatemo_sidebar">
            	
                @yield('category')
                
                <div class="cleaner_h40"></div>
                
                <h4>Recent Blogs</h4>
                <?php
               
               $recent_blog=DB::table('tbl_blog')
                            ->orderBy('blog_id','desc')
                            ->where('publication_status',1)
                            ->take(6)
                            ->get();

                ?>
                <ul class="templatemo_list">
                    @foreach($recent_blog as $v_blog)
                    <li><a href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}" target="_parent">{{$v_blog->blog_title}}</a></li>
                    @endforeach
                </ul>


                <h4>Popular Blogs</h4>
                
                     <?php              
                          $popular_blog=DB::table('tbl_blog')
                            ->orderBy('hit_count','desc')                            
                            ->take(5)
                            ->get();

                     ?>
          <ul class="templatemo_list">
            @foreach($popular_blog as $v_blog)
            <li><a href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}" target="_parent">{{$v_blog->blog_title}}</a>({{$v_blog->hit_count}})</li>
            @endforeach
                
        </ul>     
            </div>
        
        	<div class="cleaner"></div>
            
        </div>
        
    </div>
    
    <div id="templatemo_main_bottom"></div>
    
</div>

<div id="templatemo_footer">

    Copyright © 2048 <a href="index.html">Your Company Name</a> | 
    <a href="" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    
</div>

</div>
<script src="/js/app.js"></script>
</body>
</html>