@extends('admin.admin_master')
@section('admin_content')	
	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Manage Blog</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Blog</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Blog ID</th>
								  <th>Blog Title</th>
								  <th>Blog picture</th>
								  <th>Status</th>								  
								  <th>Actions</th>
							  </tr>
						  </thead>  
						@foreach($all_blog_info as $v_blog) 
						  <tbody>
							<tr>
								<td>{{$v_blog->blog_id}}</td>
								<td class="center">{{$v_blog->blog_title}}</td>
								<td class="center" ><img src="{{$v_blog->blog_image}}" width="100" height="80"></td>
								<td class="center">
									 @if ($v_blog->publication_status== 1)						
										<span class="label label-success">{{'published'}}</span>
									@else
									<span class="label label-important">{{'Unpublished'}}</span>
								    @endif
								</td>

								<td class="center">
									@if($v_blog->publication_status== 1)
											<a class="btn btn-danger" href="{{URL::to('/unpublished-blog/'.$v_blog->blog_id)}}">
												<i class="halflings-icon white thumbs-down"></i>  
											</a>
                                    @else
                                            <a class="btn btn-success" href="{{URL::to('/published-blog/'.$v_blog->blog_id)}}">
												<i class="halflings-icon white thumbs-up"></i>  
											</a>

                                    @endif
									<a class="btn btn-info" href="{{URL::to('/edit-blog/'.$v_blog->blog_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-blog/'.$v_blog->blog_id)}}" onclick="return checkDelete();">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			@endsection