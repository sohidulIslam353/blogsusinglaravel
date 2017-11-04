@extends('admin.admin_master')
@section('admin_content')
            <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Blog</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>

						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<p  class=" alert-success" style="font-size: 16px; font-weight: bolder;"><?php
						$message=Session::get('message');

						if ($message)
							{
								echo $message;
								Session::put('message',null);
							}
						

					?></p>
				<div class="box-content">
					{!! Form::open(['url' => '/save-blog','method'=>'post','enctype'=>'multipart/form-data']) !!}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Blog Title </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" required="" id="typeahead" name="blog_title" placeholder="Enter Blog Title"   >
							  </div>
							</div>  

							<div class="control-group">
							  <label class="control-label" for="typeahead">Category</label>
							  <select  name="category_id" required="">
							  	<option  > Select Category</option>
							  	@foreach($category_info as $c_info)
							  	<option value="{{$c_info->category_id}}">{{$c_info->category_name}}</option>
							  	@endforeach
							  </select>
						   </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Blog short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="blog_short_description" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Blog long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="blog_long_description" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Blog Image </label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="typeahead" name="blog_image" >
							  </div>
							</div>  


						  <div class="control-group">
							  <label class="control-label" for="typeahead">Published<span style="color: orange;">:-</span>  </label>
							  <select name="publication_status" style="color: maroon; ">
							  	<option > Select status</option>
							  	<option value="1">Published</option>
							  	<option value="0">Unpublished</option>
							  </select>
						  </div> 

							<div class="form-actions">
							  <button type="submit" class="btn btn-danger">Add Blog</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
					{!! Form::close() !!} 

					</div>
				</div><!--/span-->

			</div><!--/row-->
			@endsection