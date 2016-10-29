@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Edit video category</h3>
		</div>
		<div class="box-body">
			<form action="{{url("video_category")}}/{{$video_category->id}}/update" method = "post">
				<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
				<div class="form-group">
                    <label for="category_id">ID</label>
                    <input id="category_id" name = "category_id" type="text" class="form-control" value="{{$video_category->category_id}}">
                </div>
				<div class="form-group">
                    <label for="category_name">Name</label>
                    <input id="category_name" name = "category_name" type="text" class="form-control" value="{{$video_category->category_name}}">
                </div>
                
                <div class="form-group">
                    <label for="category_description">Description</label>
                    <input id="category_description" name = "category_description" type="text" class="form-control" value="{{$video_category->category_description}}">
                </div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Update</button>
                    <a href="{{url('/video_category/')}}" class="btn btn-primary">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection