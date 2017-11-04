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
					<a href="#">Add Category</a>
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
					{!! Form::open(['url' => '/save-category','method'=>'post']) !!}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="category_name" placeholder="Enter Category Name"   >
							  </div>
							</div>        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" id="textarea2" rows="3"></textarea>
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
							  <button type="submit" class="btn btn-danger">Add Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
					{!! Form::close() !!} 

					</div>
				</div><!--/span-->

			</div><!--/row-->
			@endsection